<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Requests\InfoOrderRequest;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Models\User;
use App\Utils\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function showOrdersStore()
    {
        return view("orders.index");
    }

    public function index()
    {
        $orders = Order::with("customer", "currency", "shipping_method", "payment_method")->get();
        return view("admin.orders.index", compact("orders"));
    }

    public function addInfoCustomer(InfoOrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated["type"] = "shipping_address";
            $user = User::find(auth()->id());
            if ($user) {
                $user->update($validated);
                if ($user->customer) {
                    $user->customer->update($validated);
                    $customer = $user->customer;
                } else {
                    $customer = $user->customer()->create($validated);
                }

                if ($customer) {
                    if ($customer->address) {
                        $customer->address->update($validated);
                    } else {
                        $address = $customer->address()->create($validated);
                    }
                    DB::commit();
                    return redirect()->route("checkout")->with("success", "Datos editados correctamente");
                }
            }
            throw new \Exception("Error al crear o actualizar el cliente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al crear o actualizar el cliente: " . $e->getMessage());
        }
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

    public function show(string $id)
    {
        $order = Order::with("items.product", "customer", "address", "currency", "shipping_method", "payment_method")->find($id);
        return view("admin.orders.show", compact("order"));
    }

    public function edit(string $id)
    {
        $order = Order::with("items.product", "customer", "address", "currency", "shipping_method", "payment_method")->find($id);
        $customers = Customer::with("user")->get();
        $paymentMethods = PaymentMethod::all();
        $shippingMethods = ShippingMethod::all();
        $addresses = Addresses::getAddresses();
        return view("admin.orders.edit", compact(
            "order",
            "customers",
            "paymentMethods",
            "shippingMethods",
            "addresses"
        ));
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($id);
            if ($order) {
                $order->delete();
                DB::commit();
                return redirect()->route("admin.orders.index")->with("success", "Orden eliminada correctamente");
            }
            throw new \Exception("Orden no encontrada");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al eliminar la orden: " . $e->getMessage());
        }
    }

    public function changeStatus(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($id);
            if ($order) {
                $dateNow = date("Y-m-d H:i:s");
                switch ($request->status) {
                    case "pending":
                        $order->update(["cancelled_at" => null, "completed_at" => null]);
                        break;
                    case "completed":
                        $order->update(["completed_at" => $dateNow, "cancelled_at" => null]);
                        break;
                    case "canceled":
                        $order->update(["cancelled_at" => $dateNow, "completed_at" => null]);
                        break;
                    default:
                        throw new \Exception("Estado de la orden no válido");
                }
                $order->update(["status" => $request->status]);
                DB::commit();
                return redirect()->route("admin.orders.index")->with("success", "Estado de la orden actualizado correctamente");
            }
            throw new \Exception("Orden no encontrada");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al actualizar el estado de la orden: " . $e->getMessage());
        }
    }

    private function generateNumberOrder()
    {
        return "ORD" . date("Ymd") . rand(1000, 9999);
    }

    private function generateTrackingNumber()
    {
        return "TRK" . date("Ymd") . rand(1000, 9999);
    }
}