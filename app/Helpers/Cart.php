<?php

namespace App\Helpers;

class Cart
{
    public static function count()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'quantity'));
        return $total;
    }

    public static function totalPrice()
    {
        $cart = session()->get("cart", []);
        $total = array_sum(array_column($cart, "subtotal"));
        return $total;
    }
}
