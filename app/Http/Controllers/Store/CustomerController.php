<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoOrderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function store(InfoOrderRequest $request)
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
}