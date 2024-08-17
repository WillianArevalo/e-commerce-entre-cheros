<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Favorites
{
    public static function get($user, $products)
    {
        if ($user) {
            $favoriteProductIds = $user->favorites->pluck('id')->toArray();
            $products->each(function ($product) use ($favoriteProductIds) {
                $product->is_favorite = in_array($product->id, $favoriteProductIds);
            });
        } else {
            $products->each(function ($product) {
                $product->is_favorite = false;
            });
        }
    }

    public static function count()
    {
        $auth = Auth::user();
        if ($auth) {
            $user = User::find($auth->id);
            if ($user) {
                return $user->favorites()->count();
            }
        }
        return 0;
    }
}
