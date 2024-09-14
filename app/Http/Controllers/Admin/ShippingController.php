<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingMethodRequest;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function index()
    {
        $methods = ShippingMethod::all();
        return view("admin.sales_strategies.shipping_methods.index", compact("methods"));
    }

    public function store(ShippingMethodRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            ShippingMethod::create($validated);
            DB::commit();
            return redirect()->route("admin.sales-strategies.shipping-methods.index")->with("success", "Shipping method created successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to create shipping method");
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            ShippingMethod::destroy($id);
            DB::commit();
            return redirect()->route("admin.sales-strategies.shipping-methods.index")->with("success", "Shipping method deleted successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to delete shipping method");
        }
    }

    public function edit(string $id)
    {
        $method = ShippingMethod::find($id);
        if ($method) {
            return response()->json(["method" => $method]);
        }
    }

    public function update(ShippingMethodRequest $request, string $id)
    {
        $validated = $request->validated();

        if (!isset($validated['is_active'])) {
            $validated['is_active'] = 0;
        }

        DB::beginTransaction();
        try {
            ShippingMethod::find($id)->update($validated);
            DB::commit();
            return redirect()->route("admin.sales-strategies.shipping-methods.index")->with("success", "Shipping method updated successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to update shipping method. Error:" . $e->getMessage());
        }
    }

    public function show(string $id)
    {

        $method = ShippingMethod::find($id);
        if ($method) {
            return response()->json([
                "html" =>
                view(
                    "layouts.__partials.ajax.admin.shipping-methods.show-method",
                    ["method" => $method]
                )->render()
            ]);
        }
    }
}