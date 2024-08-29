<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoOrderRequest;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showOrdersStore()
    {
        return view("orders.index");
    }

    public function index()
    {
        return view("admin.orders.index");
    }

    public function addInfoCustomer(InfoOrderRequest $request)
    {
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
                return redirect()->route("checkout")->with("success", "Datos editados correctamente");
            }
        }
        return back()->with("error", "Error al crear o actualizar el cliente");
    }
}