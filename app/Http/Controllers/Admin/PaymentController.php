<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::all();
        return view("admin.sales_strategies.payment_methods.index", compact("methods"));
    }

    public function store(PaymentMethodRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {

            if ($request->hasFile("image")) {
                $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/payment_methods");
            } else {
                $validated["image"] = "images/no-photo.jpg";
            }

            $method = PaymentMethod::create($validated);
            if ($method) {
                DB::commit();
                return redirect()->route("admin.sales-strategies.payment-methods.index")->with("success", "Payment method created successfully");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to create payment method. Error: " . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $method = PaymentMethod::find($id);
        if ($method) {
            $method->image = Storage::url($method->image);
            return response()->json(["method" => $method]);
        }
    }

    public function update(PaymentMethodRequest $request, string $id)
    {
        $validated = $request->validated();
        try {
            $method = PaymentMethod::find($id);
            if ($request->hasFile("image")) {
                if ($method->image) ImageHelper::deleteImage($method->image);
                $validated["image"] = ImageHelper::saveImage($request->file("image"), "images/payment_methods");
            } else {
                $validated["image"] = $method->image;
            }

            if (!isset($validated['active'])) $validated['active'] = 0;

            $method->update($validated);
            DB::commit();
            return redirect()->route("admin.sales-strategies.payment-methods.index")->with("success", "Payment method updated successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to updated payment method. Error: " . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $method = PaymentMethod::find($id);
            if ($method) {
                if ($method->image && $method->image !== "images/not-photo.jpg") {
                    ImageHelper::deleteImage($method->image);
                }
                $method->delete();
                DB::commit();
                return redirect()->route("admin.sales-strategies.payment-methods.index")->with("success", "Payment method deleted successfully");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "Failed to deleted payment method. Error: " . $e->getMessage());
        }
    }
}