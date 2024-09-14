<?php

namespace App\Helpers;

use App\Models\Cart as CartModel;
use App\Models\Currency;

class Cart
{
    public static function get()
    {
        if (!auth()->check()) {
            return null;
        }
        $user = auth()->user();
        // Buscar el carrito existente
        $cart = CartModel::with("items.product")->with("shippingMethod")->where("user_id", $user->id)->first();
        return $cart;
    }

    public static function count()
    {
        if (!auth()->user()) {
            return 0;
        }
        $cart = self::get();
        return $cart && $cart->items ? $cart->items->sum("quantity") : 0;
    }

    public static function total()
    {
        if (!auth()->check()) {
            return 0;
        }
        $cart = self::get();
        if (!$cart || !$cart->items) {
            return 0;
        }
        return $cart->items->sum(function ($item) {
            $price = $item->product->offer_price ?? $item->product->price;
            return $item->quantity * $price;
        });
    }

    public static function totalTaxes()
    {
        if (!auth()->check()) {
            return 0;
        }
        $cart = self::get();
        if (!$cart || !$cart->items) {
            return 0;
        }
        return $cart->items->sum(function ($item) {
            $price = $item->product->offer_price ?? $item->product->price;
            return $item->quantity * $price * $item->product->taxes->sum("rate") / 100;
        });
    }

    public static function totalWithTaxes()
    {
        if (!auth()->check()) {
            return 0;
        }
        $cart = self::get();
        if (!$cart || !$cart->items) {
            return 0;
        }
        return $cart->items->sum(function ($item) {
            $price = $item->product->offer_price ?? $item->product->price;
            return $item->quantity * $price * (1 + $item->product->taxes->sum("rate") / 100);
        });
    }

    public static function subtotal()
    {
        if (!auth()->check()) {
            return 0;
        }

        $totalWithTaxes = self::totalWithTaxes();
        $cart = self::get();
        if (!$cart) {
            return $totalWithTaxes;
        }
        $discountAmount = $cart->coupon ? self::calculateDiscount($cart->coupon, $totalWithTaxes) : 0;
        return $totalWithTaxes - $discountAmount;
    }

    public static function totalDiscount()
    {
        if (!auth()->check()) {
            return 0;
        }

        $cart = self::get();
        if (!$cart || !$cart->coupon) {
            return 0;
        }
        return self::calculateDiscount($cart->coupon, self::totalWithTaxes());
    }

    private static function calculateDiscount($coupon, $cartTotal)
    {
        if ($coupon->discount_type == 'fixed') {
            return min($coupon->discount_value, $cartTotal);
        } elseif ($coupon->discount_type == 'percentage') {
            return $cartTotal * ($coupon->discount_value / 100);
        }
        return 0;
    }

    public static function totalWithShippingMethod()
    {
        if (!auth()->check()) {
            return 0;
        }
        $cart = self::get();
        if (!$cart) {
            return 0;
        }
        $subtotalWithCoupon = self::subtotal();
        $shippingCost = $cart->shippingMethod ? $cart->shippingMethod->cost : 0;
        return $subtotalWithCoupon + $shippingCost;
    }

    public static function totals()
    {
        $cart = self::get();
        $symbol = Currency::getDefault()->symbol ?? config("app.currency.symbol");
        return [
            "total" => $symbol . number_format(self::total(), 2),
            "taxes" => $symbol . number_format(self::totalTaxes(), 2),
            "total_with_taxes" => $symbol . number_format(self::totalWithTaxes(), 2),
            "discount" => $symbol . number_format(self::totalDiscount(), 2),
            "subtotal" => $symbol . number_format(self::subtotal(), 2),
            "shipping" => $symbol . number_format($cart->shippingMethod->cost ?? 0, 2),
            "total_with_shipping" => $symbol . number_format(self::totalWithShippingMethod(), 2)
        ];
    }

    public static function clear()
    {
        $cart = self::get();
        if ($cart) {
            $cart->items()->delete();
            $cart->delete();
        }
    }
}