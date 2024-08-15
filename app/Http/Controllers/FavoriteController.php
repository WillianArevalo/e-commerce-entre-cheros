<?php

namespace App\Http\Controllers;

use App\Helpers\Favorites;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index()
    {
        if (!Auth::user()) {
            return redirect("/login");
        }
        $favorites = User::findOrFail(Auth::id())->favorites;
        Favorites::get(Auth::user(), $favorites);
        return view('favorites.index', compact('favorites'));
    }

    public function addFavorite(Request $request, string $id)
    {
        if (!Auth::user()) {
            return response()->json(['message' => 'Inicia sesión para guardar tus favoritos', "status" => "info"]);
        }
        $user = User::findOrFail(Auth::id());
        $product = Product::findOrFail($id);
        if ($user && $product) {
            if (!$user->favorites()->where('product_id', $product->id)->exists()) {
                $user->favorites()->attach($product);
                $product->is_favorite = true;
                return response()->json([
                    "message" => "Agregado a favoritos",
                    "status" => "success",
                    "html" => view("layouts.__partials.ajax.card-footer", compact("product"))->render()
                ]);
            } else {
                $user->favorites()->detach($product);
                $product->is_favorite = false;
                return response()->json([
                    "message" => "Removido de favorito",
                    "status" => "info",
                    "html" => view("layouts.__partials.ajax.card-footer", compact("product"))->render()
                ]);
            }
        }
    }
}