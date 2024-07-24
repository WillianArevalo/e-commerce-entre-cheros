<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCategoriesStore()
    {
        return view("categories.index");
    }


    public function index(Categorie $categorie = null)
    {
        $categories = Categorie::with("subcategories")->paginate(10);
        return view("admin.categories.index", ["categories" => $categories, "categorie" => $categorie]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route("admin.categories.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            "name" => "required|string",
            "image" => "required|image",
        ];

        if ($request->input("typeCategorie") === "secundaria") {
            $rules["categorie_id"] = "required|exists:categories,id";
            $validated = $request->validate($rules);
            $categorie = Categorie::find($request->input("categorie_id"));
            if (!$categorie) {
                return redirect()->back()->with("error", "No se pudo encontrar la categoría padre");
            }

            if ($request->hasFile("image")) {
                $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/subcategories");
            }

            $subCategorie = SubCategorie::create($validated);
            if (!$subCategorie) {
                return redirect()->back()->with("error", "No se pudo crear la subcategoría");
            }
            return redirect()->route("admin.categories.index")->with("success", "Subcategoría creada correctamente");
        }

        $validated = $request->validate($rules);

        if ($request->hasFile("image")) {
            $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/categories");
        }
        $categorie = Categorie::create($validated);
        if (!$categorie) {
            return redirect()->back()->with("error", "No se pudo crear la categoría");
        }
        return redirect()->route("admin.categories.index")->with("success", "Categoría creada correctamente");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la categoría");
        }
        $categorie->image = Storage::url($categorie->image);
        return response()->json(["categorie" => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "name" => "required|string",
            "image" => "nullable|image",
        ];

        $categorie = Categorie::find($id);
        if (!$categorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la categoría");
        }

        $validated = $request->validate($rules);
        if ($request->hasFile("image")) {
            if ($categorie->image) {
                ImageHelper::deleteImage($categorie->image);
            }
            $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/categories");
        } else {
            $validated["image"] = $categorie->image;
        }
        $categorie->update($validated);
        return redirect()->route("admin.categories.index")->with("success", "Categoría actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return redirect()->back()->with("error", "No se pudo eliminar la categoría");
        }

        if ($categorie->image) {
            ImageHelper::deleteImage($categorie->image);
        }

        $categorie->delete();
        return redirect()->route("admin.categories.index")->with("success", "Categoría eliminada correctamente");
    }


    public function search(Request $request)
    {
        $query = Categorie::query();
        if ($request->input("inputSearch")) {
            $name = $request->input("inputSearch");
            $query->where("name", "like", "%$name%");
        }

        if ($request->input("filter")) {
            $filters = $request->input("filter");

            if (!(in_array('has_subcategories', $filters) && in_array('no_subcategories', $filters))) {
                if (in_array('no_subcategories', $filters)) {
                    $query->doesntHave('subcategories');
                }

                if (in_array('has_subcategories', $filters)) {
                    $query->has('subcategories');
                }
            }
        }

        $categories = $query->get();
        if ($request->ajax()) {
            return view("layouts.__partials.ajax.row-categorie", compact("categories"))->render();
        }
    }
}
