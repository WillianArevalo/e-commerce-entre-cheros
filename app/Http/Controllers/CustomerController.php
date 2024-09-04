<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with("user")->get();
        return view("admin.customers.index", compact("customers"));
    }

    public function create()
    {
        return view("admin.customers.create");
    }

    private function getCountries()
    {
        $response = Http::get("https://restcountries.com/v3.1/all");
        if ($response->successful()) {
            return $response->json();
        }
        return response()->json(["error" => "Unable to fetch countries"], 500);
    }

    public function store(CustomerRequest $request)
    {
        $validated = $request->validated();
        $validated["role"] = "customer";

        if ($request->hasFile("profile")) {
            $validated["profile"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
        }

        $user = User::create($validated);
        if ($user) {
            $customer =  $user->customer()->create($validated);
            if ($customer) {
                return redirect()->route("admin.customers.index")->with("success", "Cliente creado correctamente");
            }
        }
        return back()->with("error", "Error al crear el cliente");
    }

    public function edit(string $id)
    {
        $customer = Customer::with("user")->find($id);
        if ($customer) {
            return view("admin.customers.edit", compact("customer"));
        }
    }

    public function update(CustomerRequest $request, string $id)
    {
        $validated = $request->validated();
        $customer = Customer::with("user")->find($id);
        if ($customer) {

            if ($customer->user->profile && $request->hasFile("profile")) {
                ImageHelper::deleteImage($customer->user->profile);
                $validated["profile"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
            }

            if ($request->input("password")) {
                $validated["password"] = Hash::make($request->input("password"));
            } else {
                $validated["password"] = $customer->user->password;
            }

            $customer->user->update($validated);
            $customer->update($validated);
            return redirect()->route("admin.customers.index")->with("success", "Cliente actualizado correctamente");
        }
        return back()->with("error", "Error al actualizar el cliente");
    }
}
