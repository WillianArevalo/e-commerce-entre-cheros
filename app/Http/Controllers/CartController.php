<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShippingMethod;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Cart as CartHelper;
use App\Models\Coupon;
use App\Models\Currency;
use App\Utils\CouponRules;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public $symbol;

    public function __construct()
    {
        $this->symbol = Currency::getDefault()->symbol;
    }

    public function index()
    {
        $cart = CartHelper::get();
        $currency = Currency::getDefault();
        if (auth()->check()) {
            $cart = Cart::with("items.product")->firstOrCreate(["user_id" => auth()->id()]);
        } else {
            $cart = session()->get('cart', null);
        }
        $shipping_methods = ShippingMethod::all();
        $products = Product::all();
        $carts_totals = CartHelper::totals();
        return view("cart.index", [
            "cart" => $cart,
            "currency" => $currency,
            "shipping_methods" => $shipping_methods,
            "products" => $products,
            "carts_totals" => $carts_totals
        ]);
    }

    public function add(string $id)
    {
        $product = Product::find($id);
        $user = auth()->user();
        DB::beginTransaction();
        try {
            $cart = Cart::firstOrCreate(["user_id" => $user->id]);
            $cartItem = $cart->items()->where("product_id", $product->id)->first();
            $price = $product->offer_price ?? $product->price;
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->sub_total += $price;
                $cartItem->save();
                DB::commit();
                return $this->responseJson("success", "Product quantity updated");
            } else {
                $cart->items()->create([
                    "product_id" => $product->id,
                    "quantity" => 1,
                    "sub_total" => $price
                ]);
                DB::commit();
                return $this->responseJson("success", "Product added to cart");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseJson("error", "An error occurred while adding product to cart. Error: " . $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            $cart = Cart::firstOrCreate(["user_id" => auth()->id()]);
            $cartItem = $cart->items()->where("product_id", $product->id)->first();
            $price = $product->offer_price ?? $product->price;
            if ($cartItem) {
                if ($request->input("action") === "plus") {
                    $cartItem->quantity += 1;
                    $cartItem->sub_total += $price;
                    $cartItem->save();
                    DB::commit();
                    return $this->responseJson("success", "Product quantity updated");
                } else {
                    if ($cartItem->quantity > 1) {
                        $cartItem->quantity -= 1;
                        $cartItem->sub_total -= $price;
                        $cartItem->save();
                        DB::commit();
                        return $this->responseJson("success", "Product quantity updated");
                    } else {
                        $cartItem->delete();
                        DB::commit();
                        return $this->responseJson("success", "Product removed from cart");
                    }
                }
            } else {
                return $this->responseJson("error", "Product not found in cart");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseJson("error", "An error occurred while updating product quantity");
        }
    }

    public function remove(string $id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            $cart = Cart::firstOrCreate(["user_id" => auth()->id()]);
            $cartItem = $cart->items()->where("product_id", $product->id)->first();
            if ($cartItem) {
                $cartItem->delete();
                DB::commit();
                return $this->responseJson("success", "Product removed from cart");
            } else {
                return $this->responseJson("error", "Product not found in cart");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseJson("error", "An error occurred while removing product from cart");
        }
    }

    public function responseJson($status, $message)
    {
        $cart = CartHelper::get();
        return response()->json([
            "status" => $status,
            "message" => $message,
            "total" => CartHelper::count(),
            "totalPrice" => $this->symbol . number_format(CartHelper::total(), 2) ??  0,
            "totalTaxes" => $this->symbol . number_format(CartHelper::totalTaxes(), 2)  ?? 0,
            "totalWithTaxes" => $this->symbol . number_format(CartHelper::totalWithTaxes(), 2) ?? 0,
            "totalDiscount" => $this->symbol . number_format(CartHelper::totalDiscount(), 2) ?? 0,
            "subtotal" => $this->symbol . number_format(CartHelper::subtotal(), 2) ?? 0,
            "totalWithShippingMethod" => $this->symbol . number_format(CartHelper::totalWithShippingMethod(), 2) ?? 0,
            "html" => view("layouts.__partials.ajax.store.row-cart", compact("cart"))->render(),
        ]);
    }

    public function appliedCoupon(string $code)
    {
        $coupon = Coupon::where("code", $code)->first();
        if (!$coupon) return redirect()->route("cart");
        return redirect()->route("cart")->with("coupon", $coupon);
    }

    public function applyCoupon(Request $request)
    {
        $couponRules = new CouponRules();
        $coupon = Coupon::with("rule")->where("code", "=", $request->input("code"))->first();
        if ($coupon) {
            $user = Auth::user();
            $conditions = [
                'user' => $user,
                "products",
                "cart_with_offers" => false,
                "cart_count" => CartHelper::count(),
                "cart_amount",
                "current_date",
                "time_of_day",
                "categories",
                "products",
                "brands",
                "labels",
                "payment_methods",
                "shipping_methods",
                "parameter" => 5
            ];
            $isValid = $couponRules->validateCoupon($coupon->rule->predefined_rule, $conditions);
            if ($isValid) {

                $cart = CartHelper::get();
                $cart->coupon()->associate($coupon);
                $cart->save();

                return response()->json([
                    "success" => "Cupón válido",
                    "discount" => $this->symbol . number_format(CartHelper::totalDiscount(), 2),
                    "total" => $this->symbol . number_format(CartHelper::subtotal(), 2)
                ]);
            } else {
                return response()->json(["error" => "Cupón no válido."]);
            }
        } else {
            return response()->json(["error" => "Not found coupon"]);
        }
    }

    public function appliedShippingMethod(Request $request)
    {
        $shipping_method = ShippingMethod::find($request->input("shipping_method"));
        if (!$shipping_method) return response()->json(["status" => "error", "message" => "Shipping method not found"]);

        $cart = CartHelper::get();
        $cart->shippingMethod()->associate($shipping_method);
        $cart->save();

        return response()->json([
            "status" => "success",
            "message" => "Shipping method applied",
            "total" => $this->symbol . number_format(CartHelper::totalWithShippingMethod(), 2),
        ]);
    }
}
