<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Helpers\Favorites;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function details(string $slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        $product = Product::with([
            'categories',
            'brands',
            'taxes',
            'labels',
            'images',
            'reviews'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $purchase = $user ? $this->userHasPurchaseProduct($user->id, $product->id) : false;
        $product->images->prepend((object)['image' => $product->main_image]);
        $products = Product::with([
            'categories',
            'subcategories',
            'brands',
            'taxes',
            'labels',
            'images'
        ])
            ->where("id", "!=", $product->id)
            ->paginate(10);

        $reviews = $product->reviews->where('is_approved', 1);
        $userReview = null;

        if ($user) {
            $userReview = $product->reviews->where('user_id', $user->id)->first();
            Favorites::get($user, $products);
        }
        return view('products.view', compact('product', 'products', 'purchase', 'user', 'userReview', "reviews"));
    }

    private function userHasPurchaseProduct($userId, $productId)
    {
        $user = User::find($userId);
        $customer = $user->customer;
        return Order::where("customer_id", $customer->id)->whereHas("items", function ($query) use ($productId) {
            $query->where("product_id", $productId);
        })->exists();
    }
}