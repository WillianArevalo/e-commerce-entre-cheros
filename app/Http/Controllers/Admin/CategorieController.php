<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{

    public function index(Categorie $categorie = null)
    {
        $categories = Categorie::with("subcategories")->paginate(10);
        return view("admin.categories.index", compact("categories", "categorie"));
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

        $isSubcategory = $request->input("typeCategorie") === "secundaria";
        if ($isSubcategory) {
            $rules["categorie_id"] = "required|exists:categories,id";
        }

        $validated = $request->validate($rules);

        try {
            DB::beginTransaction();

            if ($request->hasFile("image")) {
                $imagePath = $isSubcategory ? 'images/subcategories' : 'images/categories';
                $validated["image"] = ImageHelper::saveImage($request->file("image"), $imagePath);
            }

            if ($isSubcategory) {
                $categorie = Categorie::find($request->input("categorie_id"));
                if (!$categorie) {
                    return redirect()->back()->with("error", "No se pudo encontrar la categoría padre");
                }

                $subCategorie = SubCategorie::create($validated);
                if (!$subCategorie) {
                    throw new \Exception("No se pudo crear la subcategoría");
                }
                DB::commit();
                return redirect()->route("admin.categories.index")->with("success", "Subcategoría creada correctamente");
            }

            $categorie = Categorie::create($validated);
            if (!$categorie) {
                throw new \Exception("No se pudo crear la categoría");
            }

            DB::commit();
            return redirect()->route("admin.categories.index")->with("success", "Categoría creada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }
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

        try {
            DB::beginTransaction();

            if ($request->hasFile("image")) {
                if ($categorie->image) {
                    ImageHelper::deleteImage($categorie->image);
                }
                $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/categories");
            } else {
                $validated["image"] = $categorie->image;
            }

            $categorie->update($validated);
            DB::commit();
            return redirect()->route("admin.categories.index")->with("success", "Categoría actualizada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
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

        try {
            DB::beginTransaction();

            if ($categorie->image) {
                ImageHelper::deleteImage($categorie->image);
            }

            $categorie->delete();
            DB::commit();
            return redirect()->route("admin.categories.index")->with("success", "Categoría eliminada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $query = Categorie::query();

        if ($search = $request->input("inputSearch")) {
            $query->where("name", "like", "%$search%");
        }

        if ($filters = $request->input("filter")) {
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
            return view("layouts.__partials.ajax.admin.categorie.row-categorie", compact("categories"))->render();
        }
    }
}