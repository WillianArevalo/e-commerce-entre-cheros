<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Label;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with("categories", "subcategories", "brands", "taxes", "labels")->paginate(10);
        return view("admin.products.index", ["products" => $products]);
    }

    public function details()
    {
        return view("products.view");
    }

    public function create()
    {
        $categories = Categorie::all();
        $brands = Brand::all();
        $taxes = Tax::all();
        $labels = Label::all();

        return view("admin.products.create", ["categories" => $categories, "brands" => $brands, "taxes" => $taxes, "labels" => $labels,]);
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $status = "active";

        if ($request->hasFile("main_image")) {
            $validated["main_image"] = ImageHelper::saveImage($request->file("main_image"), "images/products");
        }

        if ($request->input("long_description")) {
            $validated["long_description"] = $request->input("long_description");
        }

        if ($request->input("offer_price") != "") {
            $rules = ["offer_start_date" => "required", "offer_end_date" => "required"];
            $request->validate($rules);

            $validated["offer_active"] = true;
            $validate["offer_price"] = $request->input("offer_price");
            $validated["offer_start_date"] = $request->input("offer_start_date");
            $validated["offer_end_date"] = $request->input("offer_end_date");
        }

        $validated["status"] = $status;
        $product = Product::create($validated);
        if ($product) {
            if ($request->input("tax_id")) {
                $taxIds = $request->input("tax_id");
                $product->taxes()->attach($taxIds);
            }

            if ($request->input("labels")) {
                $labelIds = [];
                foreach ($request->input("labels") as $label) {
                    $label = Label::firstOrCreate(["name" => $label]);
                    $labelIds[] = $label->id;
                }
                $product->labels()->attach($labelIds);
            }
            return redirect()->route("admin.products.index")->with("success", "Producto creado correctamente");
        }
    }

    public function show(string $id)
    {
        $product = Product::with("categories", "brands", "taxes", "labels")->find($id);
        return view("admin.products.show", ["product" => $product]);
    }
}
