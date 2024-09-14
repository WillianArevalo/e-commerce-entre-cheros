<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Customer;
use App\Utils\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $customer =  Customer::where("user_id", $user->id)->first();
        $addresses = Address::where("customer_id", $customer->id)->get();
        return view("account.address.index", ["customer" => $customer, "addresses" => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addresses = Addresses::getAddresses();
        return view("account.address.new", ["addresses" => $addresses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $validated = $request->validated();
        $user =  auth()->user();
        $customer = Customer::where("user_id", $user->id)->first();
        if (!$customer) return redirect()->route("account.addresses.index")->with("error", "Cliente no encontrado");

        $existingAddress = Address::where("customer_id", $customer->id)
            ->where("type", $validated["type"])
            ->first();

        if ($existingAddress) {
            return redirect()->route("account.addresses.index")->with("error", "Ya existe una dirección con el mismo tipo");
        }

        DB::beginTransaction();
        try {
            $address = new Address();
            $address->fill($validated);
            $address->customer_id = $customer->id;
            $address->save();
            DB::commit();
            return redirect()->route("account.addresses.index")->with("success", "Dirección guardada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("account.addresses.index")->with("error", "Error al guardar la dirección. Error: " . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $address = Address::where("slug", $slug)->first();
        if (!$address) return redirect()->route("account.addresses.index")->with("error", "Dirección no encontrada");
        $addresses = Addresses::getAddresses();
        return view("account.address.edit", ["address" => $address, "addresses" => $addresses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, string $id)
    {
        $validated = $request->validated();
        $address = Address::find($id);

        if (!$address) return redirect()->route("account.addresses.index")->with("error", "Dirección no encontrada");

        $existingAddress = Address::where("customer_id", $address->customer_id)
            ->where("type", $validated["type"])
            ->where("id", "!=", $address->id)
            ->first();

        if ($existingAddress) {
            return redirect()->route("account.addresses.index")->with("error", "Ya existe una dirección con el mismo tipo");
        }

        DB::beginTransaction();
        try {
            $address->fill($validated);
            $address->save();
            DB::commit();
            return redirect()->route("account.addresses.index")->with("success", "Dirección actualizada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("account.addresses.index")->with("error", "Error al actualizar la dirección. Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        if (!$address) return redirect()->route("account.addresses.index")->with("error", "Dirección no encontrada");
        DB::beginTransaction();
        try {
            $address->delete();
            DB::commit();
            return redirect()->route("account.addresses.index")->with("success", "Dirección eliminada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("account.addresses.index")->with("error", "Error al eliminar la dirección. Error: " . $e->getMessage());
        }
    }
}