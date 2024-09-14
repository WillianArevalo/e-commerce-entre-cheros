<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Helpers\Favorites;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::with("labels")->whereDoesntHave("flash_offers")->get();
        $categories = Categorie::all();
        $flashOffers = Product::whereHas('flash_offers', function ($query) {
            $query->where('is_showing', true)
                ->where('is_active', true);
        })->with(['flash_offers' => function ($query) {
            $query->where('is_showing', true)
                ->where('is_active', true);
        }])->get();

        Favorites::get($user, $products);
        Favorites::get($user, $flashOffers);

        return view('home', ["products" => $products, "flashOffers" => $flashOffers, "categories" => $categories]);
    }
}