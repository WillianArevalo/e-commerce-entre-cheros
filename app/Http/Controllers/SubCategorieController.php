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
}
