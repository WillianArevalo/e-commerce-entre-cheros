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


    public function index()
    {
        $categories = Categorie::with("subcategories")->get();
        return view("admin.categories.index", compact("categories"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view("admin.categories.create", compact("categories"));
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
        $categories = Categorie::where("id", "!=", $id)->get();
        if (!$categorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la categoría");
        }
        return view("admin.categories.edit", ["categorie" => $categorie, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "name" => "required|string",
        ];

        if ($request->input("typeCategorie") === "secundaria") {

            $rules["categorie_id"] = "required|exists:categories,id";
            $validated = $request->validate($rules);

            $categorie = Categorie::find($request->input("categorie_id"));
            if (!$categorie) {
                return redirect()->back()->with("error", "No se pudo encontrar la categoría padre");
            }
            $subCategorie = SubCategorie::find($id);
            if (!$subCategorie) {
                return redirect()->back()->with("error", "No se pudo encontrar la subcategoría");
            }

            if ($request->hasFile("image")) {
                if ($subCategorie->image) {
                    ImageHelper::deleteImage($subCategorie->image);
                }
                $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/subcategories");
            }

            $subCategorie->update($validated);
            return redirect()->route("admin.categories.index")->with("success", "Subcategoría actualizada correctamente");
        } else {

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
            }
            $categorie->update($validated);
            return redirect()->route("admin.categories.index")->with("success", "Categoría actualizada correctamente");
        }
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
}
