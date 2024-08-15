<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public float $totalCart;
    public float $totalTaxes;
    public float $totalWithTaxes;
    public float $totalDiscount;
    public float $discountCoupon;
    public float $subtotal;
    public int $countCart;
    public string $status;
    public string $message;

    public function __construct()
    {
        $this->updateCartTotals();
    }

    private function updateCartTotals(): void
    {
        $this->totalCart = Cart::totalPrice();
        $this->totalTaxes = Cart::totalTaxes();
        $this->countCart = Cart::count();
        $this->totalWithTaxes = Cart::totalWithTaxes();
        $this->totalDiscount = Cart::totalDiscount();
        $this->subtotal = Cart::subtotal();
        $this->discountCoupon = 0;
    }

    public function index()
    {
        $cart = session()->get("cart", []);
        $products = Product::all();
        return view("cart.index", [
            "cart" => $cart,
            "totalCart" => $this->totalCart,
            "totalTaxes" => $this->totalTaxes,
            "totalWithTaxes" => $this->totalWithTaxes,
            "totalDiscount" => $this->discountCoupon,
            "subtotal" => $this->subtotal,
            "products" => $products
        ]);
    }

    public function add(Request $request, string $id)
    {
        $product = Product::with("taxes")->find($id);
        $quantity = $request->input("quantity", 1);
        $cart = session()->get("cart", []);

        if (!$product) {
            return $this->errorResponse('Product not found');
        }

        if (isset($cart[$product->id])) {
            if ($product->stock > $cart[$product->id]["quantity"]) {
                $cart[$product->id]["quantity"] += $quantity;
                $this->status = "success";
                $this->message = "Producto agregado al carrito";
            } else {
                return $this->errorResponse('Cantidad máxima alcanzada');
            }
        } else {
            $totalTaxes = $product->taxes->sum('rate');
            $offer_price = $product->offer_price;
            $discount = $offer_price ? $product->price - $offer_price : 0;

            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "offer_price" => $offer_price ?? 0,
                "discount" => $discount  ?? 0,
                "image" => $product->main_image,
                "subtotal" => !$product->offer_price ?  $product->price * $quantity : $product->offer_price * $quantity,
                "taxes" => $totalTaxes,
            ];
            $this->status = "success";
            $this->message = "Producto agregado al carrito";
        }

        session()->put("cart", $cart);
        $this->updateCartTotals();

        if ($request->ajax()) {
            return $this->jsonResponse();
        }

        return redirect()->route('cart');
    }

    public function plus(string $id)
    {
        $product = Product::find($id);
        $cart = session()->get("cart", []);

        if (!$product || !isset($cart[$product->id])) {
            return $this->errorResponse('Product not found in cart!');
        }

        if ($product->stock > $cart[$product->id]["quantity"]) {
            $cart[$id]["quantity"] += 1;
            if ($product->offer_price) {
                $cart[$id]["subtotal"] = $cart[$id]["offer_price"] * $cart[$id]["quantity"];
                $cart[$id]["discount"] = ($product->price - $product->offer_price) * $cart[$id]["quantity"];
            } else {
                $cart[$id]["subtotal"] = $cart[$id]["price"] * $cart[$id]["quantity"];
            }
            $this->status = "success";
            $this->message = "Carrito actualizado con éxito";
        } else {
            return $this->errorResponse('Cantidad máxima alcanzada');
        }

        session()->put("cart", $cart);
        $this->updateCartTotals();

        return $this->jsonResponse();
    }

    public function minus(string $id)
    {
        $product = Product::find($id);
        $cart = session()->get("cart", []);
        if (!isset($cart[$id])) {
            return redirect()->route("cart")->with("error", "Product not found in cart!");
        }
        $cart[$id]["quantity"] -= 1;

        if ($product->offer_price) {
            $cart[$id]["subtotal"] = $cart[$id]["offer_price"] * $cart[$id]["quantity"];
            $cart[$id]["discount"] = ($product->price - $product->offer_price) * $cart[$id]["quantity"];
        } else {
            $cart[$id]["subtotal"] = $cart[$id]["price"] * $cart[$id]["quantity"];
        }

        if ($cart[$id]["quantity"] <= 0) {
            unset($cart[$id]);
            $this->message = "Producto eliminado del carrito";
        } else {
            $this->message = "Carrito actualizado con éxito";
        }

        $this->status = "success";

        session()->put("cart", $cart);
        $this->updateCartTotals();

        return $this->jsonResponse();
    }

    public function remove(string $id)
    {
        $cart = session()->get("cart", []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put("cart", $cart);
            $this->updateCartTotals();
            $this->status = "success";
            return $this->jsonResponse("Producto eliminado del carrito");
        }
        return redirect()->route('cart')->with('error', 'Producto no encontrado');
    }

    private function jsonResponse(string $message = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "message" => $message ?? $this->message,
            "status" => $this->status,
            "total" => $this->countCart,
            "totalPrice" => $this->totalCart,
            "totalTaxes" => $this->totalTaxes,
            "totalWithTaxes" => $this->totalWithTaxes,
            "totalDiscount" => $this->discountCoupon,
            "subtotal" => $this->subtotal,
            "html" => view("layouts.__partials.ajax.store.row-cart", ["cart" => session()->get("cart", [])])->render(),
        ], 200);
    }

    private function errorResponse(string $message): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "message" => $message,
            "status" => "error",
        ]);
    }
}
