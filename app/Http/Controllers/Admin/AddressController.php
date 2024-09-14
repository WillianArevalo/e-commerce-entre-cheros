<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Customer;
use App\Utils\Addresses;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /** Admin */
    public function store(AddressRequest $request)
    {
        $validated = $request->validated();
        $customer = Customer::find($validated["customer_id"]);
        if (!isset($validated["default"])) $validated["default"] = 0;
        if (!isset($validated["active"])) $validated["active"] = 0;
        if (!$customer) return redirect()->route("admin.customers.index")->with("error", "Cliente no encontrado");

        $existingAddress = Address::where("customer_id", $customer->id)
            ->where("type", $validated["type"])
            ->first();

        if ($existingAddress) {
            return redirect()->route("admin.customers.edit", $customer->id)->with("error", "Ya existe una dirección con el mismo tipo");
        }

        DB::beginTransaction();
        try {
            $address = new Address();
            $address->fill($validated);
            $address->customer_id = $customer->id;
            $address->save();
            DB::commit();
            return redirect()->route("admin.customers.edit",  $customer->id)->with("success", "Dirección guardada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.customers.edit", $customer->id)->with("error", "Error al guardar la dirección. Error: " . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $address = Address::find($id);
        if (!$address) return redirect()->route("admin.customers.index")->with("error", "Dirección no encontrada");
        DB::beginTransaction();
        try {
            $address->delete();
            DB::commit();
            return redirect()->route("admin.customers.edit", $address->customer_id)->with("success", "Dirección eliminada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.customers.edit", $address->customer_id)->with("error", "Error al eliminar la dirección. Error: " . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $address = Address::find($id);
        if (!$address) return response()->json(["error" => "Dirección no encontrada"], 404);
        return response()->json(["success" => "Dirección encontrada", "address" => $address]);
    }

    public function update(AddressRequest $request, string $id)
    {
        $validated = $request->validated();
        $address = Address::find($id);
        if (!isset($validated["default"])) $validated["default"] = 0;
        if (!isset($validated["active"])) $validated["active"] = 0;
        if (!$address) return redirect()->route("admin.customers.index")->with("error", "Dirección no encontrada");

        $existingAddress = Address::where("customer_id", $address->customer_id)
            ->where("type", $validated["type"])
            ->where("id", "!=", $address->id)
            ->first();

        if ($existingAddress) {
            return redirect()->route("admin.customers.edit", $address->customer_id)->with("error", "Ya existe una dirección con el mismo tipo");
        }

        DB::beginTransaction();
        try {
            $address->fill($validated);
            $address->save();
            DB::commit();
            return redirect()->route("admin.customers.edit", $address->customer_id)->with("success", "Dirección actualizada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.customers.edit", $address->customer_id)->with("error", "Error al actualizar la dirección. Error: " . $e->getMessage());
        }
    }
}