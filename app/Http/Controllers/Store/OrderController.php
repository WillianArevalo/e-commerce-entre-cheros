<?php

namespace App\Http\Controllers\Store;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth()->user()->customer->orders;

        $ordersPending = $orders->filter(function ($order) {
            return $order->status === "pending";
        });

        $ordersApproved =
            $orders->filter(function ($order) {
                return $order->status === "completed" || $order->status === "sent";
            });

        $ordersRejected =
            $orders->filter(function ($order) {
                return $order->status === "canceled";
            });

        return view("orders.index", compact("orders", "ordersPending", "ordersApproved", "ordersRejected"));
    }

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

    public function show(string $numberOrder)
    {
        $order = Order::with("items.product", "customer", "address", "currency", "shipping_method", "payment_method")->where("number_order", $numberOrder)->firstOrFail();
        return view("orders.show", compact("order"));
    }

    public function cancel(string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $order->update([
                "status" => "canceled",
                "cancelled_at" => now(),
                "reason_canceled" => request("reason_canceled")
            ]);
            DB::commit();
            return back()->with("success", "Pedido cancelado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al cancelar la orden: " . $e->getMessage());
        }
    }

    public function addComment(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $order->update([
                "customer_notes" => $request->customer_notes,
            ]);
            DB::commit();
            return back()->with("success", "Comentario agregado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al agregar el comentario: " . $e->getMessage());
        }
    }

    public function removeComment(string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $order->update([
                "customer_notes" => null,
            ]);
            DB::commit();
            return back()->with("success", "Comentario eliminado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al eliminar el comentario: " . $e->getMessage());
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