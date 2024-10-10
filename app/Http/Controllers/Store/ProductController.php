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

        $this->extractDimensions($product);
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
            Favorites::get($user, collect([$product]));
        }
        return view('products.view', compact('product', 'products', 'purchase', 'user', 'userReview', "reviews"));
    }

    private function extractDimensions(Product $product)
    {
        if (strpos($product->dimensions, ' ') !== false) {
            list($dimensions, $unit) = explode(' ', $product->dimensions);
            list($product['length'], $product['width'], $product['height']) = explode('x', $dimensions);
        }
    }

    private function userHasPurchaseProduct($userId, $productId)
    {
        $user = User::find($userId);
        $customer = $user->customer;
        return Order::where("customer_id", $customer->id)->whereHas("items", function ($query) use ($productId) {
            $query->where("product_id", $productId);
        })->exists();
    }

    public function filter(Request $request)
    {
        $filters = json_decode($request->input("filters"), true);
        $query = Product::query();

        if (isset($filters["offert_type"])) {

            if (in_array("offers", $filters["offert_type"])) {
                $query->where("offer_active", true);
            }

            if (in_array("flash_offers", $filters["offert_type"])) {
                $query->whereHas("flash_offers", function ($q) {
                    $q->where("is_active", true)
                        ->where("start_date", "<=", now())
                        ->where("end_date", ">=", now())
                        ->where("is_showing", true);
                });
            }
        }

        if (isset($filters['price_range'])) {
            foreach ($filters['price_range'] as $priceRange) {
                if ($priceRange == 'min_5') {
                    $query->orWhere('price', '<', 5);
                } elseif ($priceRange == 'entre_5_10') {
                    $query->orWhereBetween('price', [5, 10]);
                } elseif ($priceRange == 'more_10') {
                    $query->orWhere('price', '>', 10);
                }
            }
        }

        if (isset($filters['category'])) {
            $query->whereIn('categorie_id', $filters['category']);
        }

        if (isset($filters['subcategorie'])) {
            $query->whereIn('subcategorie_id', $filters['subcategorie']);
        }

        if (isset($filters["label"])) {
            $query->whereHas("labels", function ($q) use ($filters) {
                $q->whereIn("labels.id", $filters["label"]);
            });
        }

        if (isset($filters['brand'])) {
            $query->whereIn('brand_id', $filters['brand']);
        }

        if (isset($filters["older"])) {
            $query->orderBy("created_at", "asc");
        }

        if (isset($filters["order"])) {
            if ($filters["order"] === "recent") {
                $query->orderBy("created_at", "desc");
            }

            if ($filters["order"] === "price_asc") {
                $query->orderBy("price", "asc");
            }

            if ($filters["order"] === "price_desc") {
                $query->orderBy("price", "desc");
            }

            if ($filters["order"] === "offer") {
                $query->where("offer_price", ">", 0)->orderBy("offer_price", "asc");
            }
        }
        $products = $query->get();
        return response()->json(["html" => view('layouts.__partials.ajax.store.product-list', compact('products'))->render()]);
    }

    public function search(Request $request)
    {
        $search = $request->input("search");
        $products = Product::where("name", "like", "%$search%")->get();
        return response()->json(["html" => view('layouts.__partials.ajax.store.product-list', compact('products'))->render()]);
    }
}
