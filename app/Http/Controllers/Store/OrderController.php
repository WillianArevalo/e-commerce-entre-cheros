<?php

namespace App\Http\Controllers\Store;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store()
    {
        DB::beginTransaction();
        $cart = Cart::get();
        $currency = session()->get("currency");
        $payment_method = session()->get("payment_method");
        try {
            $data = [
                "number_order" => $this->generateNumberOrder(),
                "status" => "pending",
                "subtotal" => Cart::total(),
                "total" => Cart::totalWithShippingMethod(),
                "tax" => Cart::totalTaxes(),
                "discount" => Cart::totalDiscount(),
                "tracking_number" => $this->generateTrackingNumber(),
                "customer_id" => auth()->user()->customer->id,
                "currency_id" => $currency->id,
                "user_id" => auth()->id(),
                "shipping_method_id" => $cart->shipping_method_id,
                "payment_method_id" => $payment_method->id,
                "address_id" => auth()->user()->customer->address->id,
            ];
            $order = Order::create($data);
            foreach ($cart->items as $item) {
                $price = $item->product->offer_price ?? $item->product->price;
                $order->items()->create([
                    "product_id" => $item->product->id,
                    "quantity" => $item->quantity,
                    "price" => $price,
                    "total" => $price * $item->quantity
                ]);
            }
            DB::commit();
            return redirect()->route("checkout")->with("success", "Orden creada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al crear la orden: " . $e->getMessage());
        }
    }

    public function generateNumberOrder()
    {
        return "ORD" . date("Ymd") . rand(1000, 9999);
    }

    public function generateTrackingNumber()
    {
        return "TRK" . date("Ymd") . rand(1000, 9999);
    }
}