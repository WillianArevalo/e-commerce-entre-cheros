<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public string $status;
    public string $message;

    public function index()
    {
        $cart = session()->get("cart", []);
        $totalCart = Cart::totalPrice();
        return view("cart.index", ["cart" => $cart, "totalCart" => $totalCart]);
    }

    public function add(Request $request, string $id)
    {
        $product = Product::find($id);
        $quantity = $request->input("quantity");

        $cart = session()->get("cart", []);

        if ($product) {
            if (isset($cart[$product->id])) {
                if ($product->stock > $cart[$product->id]["quantity"]) {
                    $cart[$product["id"]]["quantity"] += $quantity;
                    $this->status = "success";
                    $this->message = "Producto agregado al carrito";
                } else {
                    $this->status = "error";
                    $this->message = "Stock insuficiente";
                }
            } else {
                $cart[$product["id"]] = [
                    "id" => $product["id"],
                    "name" => $product["name"],
                    "quantity" => $quantity,
                    "price" => $product["price"],
                    "image" => $product["main_image"],
                    "subtotal" => $product["price"] * $quantity
                ];
                $this->message = "Producto agregado al carrito";
                $this->status = "success";
            }
        }
        session()->put("cart", $cart);
        if ($request->ajax()) {
            return response()->json(["message" => $this->message, "status" => $this->status, "total" => Cart::count()]);
        }
    }

    public function plus(string $id)
    {
        $product = Product::find($id);
        $cart = session()->get("cart", []);
        if (isset($cart[$product->id])) {
            if ($product->stock > $cart[$product->id]["quantity"]) {
                $cart[$id]["quantity"] += 1;
                $cart[$id]["subtotal"] = $cart[$id]["price"] * $cart[$id]["quantity"];
                $this->status = "success";
                $this->message = "Carrito actualizado con éxito";
            } else {
                $this->message = "Stock insuficiente";
                $this->status = "error";
            }
            session()->put("cart", $cart);
            $cart = session()->get("cart", []);
            return response()->json(["message" => $this->message, "status" => $this->status, "html" => view("layouts.__partials.ajax.row-cart", compact("cart"))->render(), "total" => Cart::count(), "totalPrice" => Cart::totalPrice()]);
        }
        return redirect()->route("cart")->with("error", "Product not found in cart!");
    }

    public function minus(string $id)
    {
        $cart = session()->get("cart", []);
        if (isset($cart[$id])) {
            $cart[$id]["quantity"] -= 1;
            $cart[$id]["subtotal"] = $cart[$id]["price"] * $cart[$id]["quantity"];
            $this->message = "Carrito actualizado con éxito";
            $this->status = "success";

            if ($cart[$id]["quantity"] <= 0) {
                unset($cart[$id]);
                $this->message = "Producto eliminado del carrito";
            }

            session()->put("cart", $cart);
            $cart = session()->get("cart", []);

            return response()->json(["message" => $this->message, "status" => $this->status, "html" => view("layouts.__partials.ajax.row-cart", compact("cart"))->render(), "total" => Cart::count(), "totalPrice" => Cart::totalPrice()]);
        }
        return redirect()->route("cart")->with("error", "Product not found in cart!");
    }

    public function remove(string $id)
    {
        if ($id) {
            $cart = session()->get("cart", []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put("cart", $cart);
                $cart = session()->get("cart", []);
                return response()->json(["message" => "Producto eliminado del carrito", "html" => view("layouts.__partials.ajax.row-cart", compact("cart"))->render(), "total" => Cart::count(), "totalPrice" => Cart::totalPrice()]);
            }
        }
        return redirect()->route('cart')->with('error', 'Product not found in cart!');
    }
}
