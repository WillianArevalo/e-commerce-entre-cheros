<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashOffer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlashOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = FlashOffer::with("product")->get();
        $products = Product::doesntHave("flash_offers")->get();
        return view("admin.flash_offers.index", ["products" => $products, "offers" => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::doesntHave("flash_offers")->get();
        return view("admin.flash_offers.create", compact("products"));
    }

    public function addFlashOffer(Request $request)
    {
        $rules = ["product_id" => "required"];
        $validated = $request->validate($rules);
        $product = Product::find($validated["product_id"]);
        $offer = FlashOffer::where("product_id", $product->id)->first();
        if ($offer) {
            return redirect()->route("admin.products.index")->with("error", "Producto con oferta relámpago ya existente");
        }
        if ($product->offer_price) {
            $validated["start_date"] = $product->offer_start_date;
            $validated["end_date"] = $product->offer_end_date;
            $product->flash_offers()->create($validated);
            return redirect()->route("admin.products.index")->with("success", "Oferta relámpago creada con éxito");
        } else {
            return redirect()->route("admin.flash-offers.index")->with("product", $product);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ["product_id" => "required", "offer_price" => "required|numeric", "start_date" => "required|date", "end_date" => "required|date"];
        $validated = $request->validate($rules);
        $isShowing = $request->has("is_showing") ? 1 : 0;
        $isActive = $request->has("is_active") ? 1 : 0;
        $validated["is_showing"] = $isShowing;
        $validated["is_active"] = $isActive;
        $product = Product::find($validated["product_id"]);
        if ($product) {
            $offer = FlashOffer::where("product_id", $validated["product_id"])->first();
            if ($offer) {
                return redirect()->route("admin.products.index")->with("error", "Producto con oferta relámpago ya existente");
            }
            $product->flash_offers()->create($validated);
            $product->update(["offer_price" => $validated["offer_price"], "offer_start_date" => $validated["start_date"], "offer_end_date" => $validated["end_date"]]);
            return redirect()->route("admin.flash-offers.index")->with("success", "Oferta relámpago creada con éxito");
        } else {
            return redirect()->route("admin.flash-offers.create")->with("error", "Producto no encontrado");
        }
    }

    public function changeShow(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $offer = FlashOffer::find($id);
            if ($offer) {
                !$request->input("is_showing") ?
                    $offer->update(["is_showing" => 0]) :
                    $offer->update(["is_showing" => 1]);
            }
            DB::commit();
            return response()->json(["success" => "Oferta actualizada correctamente"]);
        } catch (\Exception $e) {
            return response()->json(["error" => "Erro al actualizar la oferta. Error: " . $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $offer = FlashOffer::find($id);
            if ($offer) {
                !$request->input("is_active") ?
                    $offer->update(["is_active" => 0]) :
                    $offer->update(["is_active" => 1]);
            }
            DB::commit();
            return response()->json(["success" => "Oferta actualizada correctamente"]);
        } catch (\Exception $e) {
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = FlashOffer::find($id);
        if ($offer) {
            $product = Product::find($offer->product_id);
            return response()->json(["offer" => $offer, "product" => $product]);
        } else {
            return redirect()->route("admin.flash-offers.index")->with("error", "Oferta relámpago no encontrada");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ["offer_price" => "required|numeric", "start_date" => "required|date", "end_date" => "required|date"];
        $validated = $request->validate($rules);
        $isShowing = $request->has("is_showing") ? 1 : 0;
        $isActive = $request->has("is_active") ? 1 : 0;
        $validated["is_showing"] = $isShowing;
        $validated["is_active"] = $isActive;
        $offer = FlashOffer::find($id);
        if ($offer) {
            $offer->update($validated);
            $product = Product::find($offer->product_id);
            $product->update(["offer_price" => $validated["offer_price"], "offer_start_date" => $validated["start_date"], "offer_end_date" => $validated["end_date"]]);
            return redirect()->route("admin.flash-offers.index")->with("success", "Oferta relámpago actualizada con éxito");
        } else {
            return redirect()->route("admin.flash-offers.index")->with("error", "Oferta relámpago no encontrada");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = FlashOffer::find($id);
        if ($offer) {
            $offer->delete();
            return redirect()->route("admin.flash-offers.index")->with("success", "Oferta relámpago eliminada con éxito");
        } else {
            return redirect()->route("admin.flash-offers.index")->with("error", "Oferta relámpago no encontrada");
        }
    }
}