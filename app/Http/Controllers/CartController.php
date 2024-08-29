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
use App\Models\PaymentMethod;
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
            "totalPrice" => $this->priceFormat(CartHelper::total()),
            "totalTaxes" => $this->priceFormat(CartHelper::totalTaxes()),
            "totalWithTaxes" => $this->priceFormat(CartHelper::totalWithTaxes()),
            "totalDiscount" => $this->priceFormat(CartHelper::totalDiscount()),
            "subtotal" => $this->priceFormat(CartHelper::subtotal()),
            "totalWithShippingMethod" => $this->priceFormat(CartHelper::totalWithShippingMethod()),
            "html" => view("layouts.__partials.ajax.store.row-cart", compact("cart"))->render(),
        ]);
    }

    public function priceFormat($number)
    {
        return $this->symbol . number_format($number, 2) ?? 0;
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
        $cart = CartHelper::get();

        if (!$cart) {
            return response()->json(["error" => "No puedes aplicar un cupón a un carrito vacío"]);
        }

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
                DB::beginTransaction();
                try {

                    $cart->coupon()->associate($coupon);
                    $cart->save();
                    DB::commit();
                    return response()->json([
                        "success" => "Cupón válido",
                        "discount" => $this->priceFormat(CartHelper::totalDiscount()),
                        "total" => $this->priceFormat(CartHelper::subtotal()),
                        "totalWithShippingMethod" => $this->priceFormat(CartHelper::totalWithShippingMethod()),
                        "html" => view("layouts.__partials.ajax.store.form-coupon", ["cart" => CartHelper::get()])->render()
                    ]);
                } catch (\Exception $e) {
                    return response()->json(["error" => "An error occurred while applying the coupon. Error: " . $e->getMessage()]);
                }
            } else {
                return response()->json(["error" => "Cupón no válido."]);
            }
        } else {
            return response()->json(["error" => "Not found coupon"]);
        }
    }

    public function removeCoupon(string $id)
    {
        $cart = CartHelper::get();
        $coupon = Coupon::find($id);
        DB::beginTransaction();
        try {
            $cart->coupon()->dissociate($coupon);
            $cart->save();
            DB::commit();
            return response()->json([
                "success" => "Cupón eliminado",
                "discount" => $this->priceFormat(CartHelper::totalDiscount()),
                "total" => $this->priceFormat(CartHelper::subtotal()),
                "totalWithShippingMethod" => $this->priceFormat(CartHelper::totalWithShippingMethod()),
                "html" => view("layouts.__partials.ajax.store.form-coupon", ["cart" => CartHelper::get()])->render()
            ]);
        } catch (\Exception $e) {
            return response()->json(["error" => "An error occurred while removing the coupon. Error: " . $e->getMessage()]);
        }
    }

    public function applyShippingMethod(Request $request)
    {
        $shipping_method = ShippingMethod::find($request->input("shipping_method"));
        if (!$shipping_method) return response()->json(["status" => "error", "message" => "Shipping method not found"]);
        $cart = CartHelper::get();
        DB::beginTransaction();
        try {
            $cart->shippingMethod()->associate($shipping_method);
            $cart->save();
            DB::commit();
            return response()->json([
                "status" => "success",
                "message" => "Shipping method applied",
                "total" => $this->priceFormat(CartHelper::totalWithShippingMethod()),
            ]);
        } catch (\Exception $e) {
            return response()->json(["status" => "error", "message" => "An error occurred while applying the shipping method. Error: " . $e->getMessage()]);
        }
    }

    public function applyPaymentMethod(Request $request)
    {
        $paymentMethod = PaymentMethod::find($request->input("payment_method"));
        if (!$paymentMethod) {
            return response()->json(["error" => "Método de pago no encontrado"]);
        }
        session()->put("payment_method", $paymentMethod);
        return response()->json([
            "success" => "Método de pago aplicado",
            "html" => view("layouts.__partials.ajax.store.payment-method", ["payment" => $paymentMethod])->render()
        ]);
    }
}