<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
        $currencyDefault = Currency::where("is_default", true)->first();
        return view(
            "admin.sales_strategies.currencies.index",
            [
                "currencies" => $currencies,
                "currencyDefault" => $currencyDefault
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        $validated = $request->validated();
        try {
            if (!isset($validated["is_default"])) {
                $validated["is_default"] = 0;
            }
            $currency = Currency::create($validated);
            if ($currency) {
                DB::commit();
                return redirect()->route("admin.sales-strategies.currencies.index")->with("success", "Currency created successfully");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.sales-strategies.currencies.index")->with("error", "Failed to created currency. Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currency = Currency::find($id);
        if ($currency) {
            return response()->json(["currency" => $currency]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, string $id)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $currency = Currency::find($id);
            if ($currency) {

                /* if ($currency->is_default === 1 && (!isset($validated['active']) || $validated['active'] == 0)) {
                    return redirect()->route("admin.sales-strategies.index")
                        ->with("error", "The default currency cannot be deactivated.");
                } */

                if (!isset($validated["active"])) {
                    $validated["active"] = 0;
                }

                if (!isset($validated["auto_update"])) {
                    $validated["auto_update"] = 0;
                }

                $currency->update($validated);
                DB::commit();
                return redirect()->route("admin.sales-strategies.currencies.index")->with("success", "Currency updated successfully");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.sales-strategies.currencies.index")->with("error", "Failed to updated currency. Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $currency = Currency::find($id);
            if ($currency) {
                $currency->delete();
                DB::commit();
                return redirect()->route("admin.sales-strategies.currencies.index")->with("success", "Currency deleted successfully");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.sales-strategies.currencies.index")->with("success", "Failed to deleted currency. Error: " . $e->getMessage());
        }
    }
}