<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Helpers\Favorites;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        try {

            if (!Auth::check()) {
                return response()->json([
                    'message' => 'Inicia sesión para guardar tus favoritos',
                    'status' => 'auth',
                    'redirect'
                ]);
            }

            $auth = Auth::user();
            $user = User::find($auth->id);
            $product = Product::findOrFail($id);
            $isFavorite = $user->favorites()->where('product_id', $product->id)->exists();

            if (!$isFavorite) {
                $user->favorites()->attach($product);
                $product->is_favorite = true;
                $message = "Agregado a favoritos";
                $status = "success";
            } else {
                $user->favorites()->detach($product);
                $product->is_favorite = false;
                $message = "Removido de favorito";
                $status = "info";
            }
            return response()->json([
                'message' => $message,
                'status' => $status,
                'html' => view("layouts.__partials.ajax.store.card-footer", compact("product"))->render(),
                "count" => Favorites::count()
            ]);
        } catch (\Exception $e) {
            Log::error('Error al agregar o remover de favoritos: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al agregar el producto a favoritos',
                'status' => 'error'
            ], 500);
        }
    }
}