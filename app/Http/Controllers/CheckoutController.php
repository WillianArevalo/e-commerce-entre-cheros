<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Cart as CartHelper;
use App\Models\PaymentMethod;
use App\Models\Product;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $cart = CartHelper::get();
        $products = Product::all();
        $user = auth()->user();
        $countries = $this->getAllCountries();
        $payment_methods = PaymentMethod::all();

        if (!$user || !$cart) {
            return redirect()->route("cart")->with("error", "No hay productos en el carrito");
        }

        $customer = $user->customer;

        if ($customer) {
            $customer = $customer->load("address");
        }

        return view("checkout.index", [
            "products" => $products,
            "user" => $user,
            "cart" => $cart,
            "customer" => $customer,
            "countries" => $countries,
            "payment_methods" => $payment_methods,
            "carts_totals" => CartHelper::totals()
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
}