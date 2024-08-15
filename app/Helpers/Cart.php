<?php

namespace App\Helpers;

class Cart
{
    public static function count()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return 0;
        }

        $total = array_sum(array_column($cart, 'quantity'));
        return $total;
    }

    public static function totalPrice()
    {
        $cart = session()->get("cart", []);
        if (empty($cart)) {
            return 0;
        }
        $total = array_sum(array_column($cart, "subtotal"));
        return $total;
    }

    public static function totalTaxes()
    {
        $cart = session()->get("cart", []);
        if (empty($cart)) {
            return 0;
        }
        $totalTaxes = 0;
        foreach ($cart as $item) {
            $subtotal = $item['subtotal'];
            $taxRate = $item['taxes'];
            $itemTax = ($subtotal * $taxRate) / 100;
            $totalTaxes += $itemTax;
        }
        return $totalTaxes;
    }

    public static function totalWithTaxes()
    {
        $totalPrice = self::totalPrice();
        $totalTaxes = self::totalTaxes();
        $totalWithTaxes = $totalPrice + $totalTaxes;
        return $totalWithTaxes;
    }

    public static function totalDiscount()
    {
        $cart = session()->get("cart", []);
        if (empty($cart)) {
            return 0;
        }
        $total = array_sum(array_column($cart, "discount"));
        return $total;
    }

    public static function subtotal()
    {
        $totalWithTaxes = self::totalWithTaxes();
        $subtotal = $totalWithTaxes;
        return $subtotal;
    }
}
