<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Coupon;
use App\Models\CouponRule;
use App\Models\Label;
use App\Models\Product;
use App\Utils\CouponRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::with("rule")->get();
        return view("admin.sales_strategies.index", ["coupons" => $coupons]);
    }

    public function create()
    {
        try {
            $products = Product::all();
            $categories = Categorie::all();
            $labels = Label::all();
            $rules = CouponRules::getPredefinedRules();
            $brands = Brand::all();
            return view("admin.sales_strategies.coupon.new-coupon", [
                "products" => $products,
                "categories" => $categories,
                "labels" => $labels,
                "rules" => $rules,
                "brands" => $brands
            ]);
        } catch (\Exception $e) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error al cargar los productos, categorías y etiquetas");
        }
    }

    public function store(CouponRequest $request)
    {
        $validated = $request->validated();
        if ($this->isDuplicateCouponCode($validated["code"])) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "El código de cupón ya existe");
        }
        $parametersJson = $this->filterAndEncodeParameters($request->input("parameters"));
        DB::beginTransaction();
        try {

            $coupon = Coupon::create([
                'code' => $validated['code'],
                'discount_value' => $validated['discount_value'],
                'discount_type' => $validated['discount_type'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'usage_limit' => $validated['usage_limit'] ?? 1,
            ]);

            CouponRule::create([
                'coupon_id' => $coupon->id,
                'predefined_rule' => $validated["predefined_rule"],
                'parameters' => $parametersJson
            ]);

            DB::commit();
            return redirect()->route("admin.sales-strategies.index")->with("success", "Cupón creado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error al crear el cupón");
        }
    }

    private function isDuplicateCouponCode($code)
    {
        return Coupon::where("code", $code)->exists();
    }

    private function filterAndEncodeParameters($parameters)
    {
        if (is_array($parameters)) {
            $filteredParameters = array_values(array_filter($parameters, function ($value) {
                return !is_null($value) && $value !== '';
            }));
            return json_encode($filteredParameters);
        }
        return null;
    }

    public function show(string $id)
    {
        try {
            $coupon = Coupon::with("rule")->find($id);

            if ($coupon && $coupon->rule) {
                $parameters = json_decode($coupon->rule->parameters);
                $rule = $coupon->rule->predefined_rule;
                if (is_array($parameters)) {
                    $coupon->rule->parameters =  $this->getParameters($rule, $coupon, $parameters);
                } else {
                    $coupon->rule->parameters = $parameters;
                }
            }
            return response()->json([
                "html" => view(
                    "layouts.__partials.ajax.admin.coupon.show-coupon",
                    ["coupon" => $coupon]
                )->render()
            ]);
        } catch (\Exception $e) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error al mostrar el cupón");
        }
    }

    public function getParameters($rule, $coupon, $parameters)
    {
        $params = [];
        switch ($rule) {
            case "combination_of_products":
            case "specific_products":
                $params = Product::whereIn('id', $parameters)->get();
                break;
            case "specific_categories":
            case "specific_category":
                $params = Categorie::whereIn('id', $parameters)->get();
                break;
            case "specific_labels":
                $params = Label::whereIn('id', $parameters)->get();
                break;
            case "specific_brands":
                $params = Brand::whereIn('id', $parameters)->get();
                break;
            default:
                $params = $parameters;
                break;
        }
        return $params;
    }

    public function update(CouponRequest $request, string $id)
    {
        $validated = $request->validated();
        $coupon = Coupon::find($id);
        if ($coupon) {
            $parametersJson = $this->filterAndEncodeParameters($request->input("parameters"));
            DB::beginTransaction();
            try {
                $coupon->update([
                    'code' => $validated['code'],
                    'discount_value' => $validated['discount_value'],
                    'discount_type' => $validated['discount_type'],
                    'start_date' => $validated['start_date'],
                    'end_date' => $validated['end_date'],
                    'usage_limit' => $validated['usage_limit'] ?? 1,
                ]);

                $coupon->rule()->update([
                    'predefined_rule' => $validated["predefined_rule"],
                    'parameters' => $parametersJson
                ]);

                DB::commit();
                return redirect()->route("admin.sales-strategies.index")->with("success", "Cupón actualizado correctamente");
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route("admin.sales-strategies.index")->with("error", "Error al actualizar el cupón");
            }
        }
    }

    public function edit(string $id)
    {
        try {
            $coupon = Coupon::with("rule")->find($id);
            $products = Product::all();
            $categories = Categorie::all();
            $labels = Label::all();
            $rules = CouponRules::getPredefinedRules();
            $brands = Brand::all();

            $params = json_decode($coupon->rule->parameters); // 15
            $rule = $coupon->rule->predefined_rule; // minimum_amount

            $parameters_ids = "";
            $parameters_names = "";
            $parameter = "";
            $parameters = "";

            if (is_array($parameters) && count($parameters) > 0) {
                $paramsRules =  $this->getParameters($rule, $coupon, $params);
                if (count($parameters) === 1 && count($paramsRules) === 1) {
                    $parameter = $parameters[0];
                    $parameters = null;
                    $parameters_ids = null;
                    $parameters_names = null;
                } else {
                    $parameters_ids = implode(",", $paramsRules->pluck('id')->toArray());
                    $parameters_names = implode(",", $paramsRules->pluck('name')->toArray());
                }
            }

            return view("admin.sales_strategies.coupon.edit-coupon", [
                "coupon" => $coupon,
                "products" => $products,
                "categories" => $categories,
                "labels" => $labels,
                "rules" => $rules,
                "brands" => $brands,
                "parameters_ids" => $parameters_ids,
                "parameters_names" => $parameters_names,
                "parameters" => $parameters,
                "parameter" => $parameter
            ]);
        } catch (\Exception $e) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error: " . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            DB::beginTransaction();
            try {
                $coupon->rule()->delete();
                $coupon->delete();
                DB::commit();
                return redirect()->route("admin.sales-strategies.index")->with("success", "Cupón eliminado correctamente");
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route("admin.sales-strategies.index")->with("error", "Error al eliminar el cupón");
            }
        }
    }
}