<?php

namespace App\Helpers;

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
}
