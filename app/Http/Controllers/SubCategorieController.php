<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;

class SubCategorieController extends Controller
{

    public function edit(string $id)
    {
        $subcategorie = SubCategorie::find($id);
        $categories = Categorie::all();
        if (!$subcategorie) {
            return redirect()->back()->with("error", "No se pudo encontrar la subcategoría");
        }
        return view("admin.categories.edit", ["categorie" => $subcategorie, "categories" => $categories, "type" => "secundaria"]);
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
            $html = view("layouts.__partials.ajax.option-subcategorie", compact("subcategories"))->render();
            return response()->json(["message" => "Encontrado", "html" => $html, "subcategoria" => $subcategorieSelected], 201);
        } else {
            return response()->json(["message" => "No encontrado"], 400);
        }
    }
}