<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\User;
use App\Utils\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function index()
    {
        $customers = Customer::with("user")->get();
        return view("admin.customers.index", compact("customers"));
    }

    public function create()
    {
        $currencies = Currency::all();
        $countries = $this->getAllCountries();
        $addresses = Addresses::getAddresses();
        $users = User::doesntHave("customer")->get();
        return view("admin.customers.create", [
            "currencies" => $currencies,
            "countries" => $countries,
            "addresses" => $addresses,
            "users" => $users
        ]);
    }

    public function getAllCountries()
    {
        $reponse = $this->client->request('GET', 'https://restcountries.com/v3.1/all');
        $countries = json_decode($reponse->getBody()->getContents(), true);
        $countryNames = array_map(function ($country) {
            return $country['name']['common'];
        }, $countries);
        $countryArray = array_combine($countryNames, $countryNames);
        ksort($countryArray);
        return $countryArray;
    }

    public function store(CustomerRequest $request, AddressRequest $addressRequest)
    {
        $customerRequest = $request->validated();
        $addressRequest = $addressRequest->validated();

        DB::beginTransaction();
        try {
            // Crear cliente asociado al usuario
            $customer = Customer::create($customerRequest);

            // Crear dirección asociada al cliente
            Address::create([
                'customer_id' => $customer->id,
                'address_line_1' => $addressRequest['address_line_1'],
                'address_line_2' => $addressRequest['address_line_2'],
                'city' => $addressRequest['city'],
                'state' => $addressRequest['state'],
                'country' => $addressRequest['country'],
                'zip_code' => $addressRequest['zip_code'],
                'type' => $addressRequest['type'],
                'default' => $addressRequest['default'] ?? 0,
                'active' => $addressRequest['active'] ?? 0,
            ]);

            // Solo aquí se confirma la transacción completa
            DB::commit();

            return redirect()->route('admin.customers.index')->with('success', 'Cliente creado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el cliente: ' . $e->getMessage());
        }
    }



    public function edit(string $id)
    {
        $customer = Customer::with("user")->with("address")->find($id);
        $address = Address::where('customer_id', $id)->get();
        $currencies = Currency::all();
        $countries = $this->getAllCountries();
        $addresses = Addresses::getAddresses();
        $users = User::doesntHave("customer")->get();
        if ($customer) {
            return view(
                "admin.customers.edit",
                [
                    "customer" => $customer,
                    "currencies" => $currencies,
                    "countries" => $countries,
                    "addresses" => $addresses,
                    "users" => $users,
                    "address" => $address
                ]
            );
        }
    }

    public function update(CustomerRequest $request, string $id)
    {
        $customerRequest = $request->validated();
        $customer = Customer::with("user")->find($id);
        if ($customer) {
            DB::beginTransaction();
            try {

                if ($request->input("name") != $customer->user->name || $request->input("last_name") != $customer->user->last_name) {
                    $user = User::find($customer->user_id);
                    $user->update([
                        "name" => $request->input("name"),
                        "last_name" => $request->input("last_name"),
                    ]);
                }

                $customer->update($customerRequest);
                DB::commit();
                return redirect()->route("admin.customers.index")->with("success", "Cliente actualizado correctamente");
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with("error", "Error al actualizar el cliente: " . $e->getMessage());
            }
        }
        return back()->with("error", "Cliente no encontrado");
    }

    public function destroy(string $id)
    {
        $customer = Customer::with("user")->find($id);
        DB::beginTransaction();
        try {
            if ($customer) {
                $customer->user->delete();
                DB::commit();
                return redirect()->route("admin.customers.index")->with("success", "Cliente eliminado correctamente");
            }
            return back()->with("error", "Cliente no encontrado");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Error al eliminar el cliente: " . $e->getMessage());
        }
    }
}