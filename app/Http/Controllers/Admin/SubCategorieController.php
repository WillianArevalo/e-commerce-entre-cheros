<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategorieController extends Controller
{

    public function edit(string $id)
    {
        $subcategorie = SubCategorie::find($id);
        if (!$subcategorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la subcategoría");
        }
        $subcategorie->image = Storage::url($subcategorie->image);
        return response()->json(["categorie" => $subcategorie]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "image" => "nullable|image",
        ]);

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
    }

    public function destroy(string $id)
    {
        $subcategorie = SubCategorie::find($id);
        if (!$subcategorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la subcategoría");
        }

        if ($subcategorie->image) {
            ImageHelper::deleteImage($subcategorie->image);
        }

        $subcategorie->delete();
        return redirect()->route("admin.categories.index")->with("success", "Subcategoría eliminada correctamente");
    }

    public function search(Request $request)
    {
        $query = SubCategorie::where("categorie_id", $request->input("categorie_id"));
        $subcategories = $query->get();
        if ($request->ajax()) {
            $subcategorieSelected["name"] = "No tiene subcategorías";
            if ($subcategories->first()) {
                $subcategorieSelected = $subcategories->first();
            }
            return response()->json(["message" => "Encontrado", "html" => view("layouts.__partials.ajax.admin.categorie.option-subcategorie", compact("subcategories"))->render(), "subcategoria" => $subcategorieSelected], 201);
        } else {
            return response()->json(["message" => "No encontrado"], 400);
        }
    }
}