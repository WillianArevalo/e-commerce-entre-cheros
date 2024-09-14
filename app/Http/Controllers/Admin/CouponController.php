<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Coupon;
use App\Models\CouponRule;
use App\Models\Currency;
use App\Models\Label;
use App\Models\Product;
use App\Utils\CouponRules;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{

    public $symbol;

    public function __construct()
    {
        $this->symbol = Currency::getDefault()->symbol;
    }

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

            $coupon = Coupon::create($validated);

            CouponRule::create([
                'coupon_id' => $coupon->id,
                'predefined_rule' => $validated["predefined_rule"],
                'parameters' => $parametersJson
            ]);

            DB::commit();
            return redirect()->route("admin.sales-strategies.index")->with("success", "Cupón creado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error al crear el cupón. Error: " . $e->getMessage());
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
            $paramsJson = json_decode($coupon->rule->parameters);
            $params = $this->getParameters($coupon->rule->predefined_rule, $paramsJson);

            if (!$params) {
                $parameters = $paramsJson[0] ?? "";
                $type = "data";
            } else {
                $type = "model";
                $parameters = $params;
            }

            return response()->json([
                "html" => view(
                    "layouts.__partials.ajax.admin.coupon.show-coupon",
                    [
                        "coupon" => $coupon,
                        "type" => $type,
                        "parameters" => $parameters
                    ]
                )->render()
            ]);
        } catch (\Exception $e) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error al mostrar el cupón");
        }
    }

    public function edit(string $id)
    {
        try {
            $coupon = Coupon::with("rule")->find($id);
            $paramsJson = json_decode($coupon->rule->parameters);
            $rule = $coupon->rule->predefined_rule;
            $data = $this->getDataModel($rule);
            $params = $this->getParameters($rule, $paramsJson);
            $type = "";

            if (!$params) {
                //*No son datos de modelo
                $parameters = $paramsJson[0] ?? "";
                $type = "data";
            } else {
                //* Son datos del modelo
                $type = "model";
                $parameters = $params;
                $ids = implode(",", $parameters->pluck('id')->toArray());
                $names = implode(",", $parameters->pluck('name')->toArray());
            }

            return view("admin.sales_strategies.coupon.edit-coupon", [
                "coupon" => $coupon,
                "data" => $data,
                "parameters" => $parameters,
                "type" => $type,
                "ids" => $ids ?? "",
                "names" => $names ?? ""
            ]);
        } catch (\Exception $e) {
            return redirect()->route("admin.sales-strategies.index")->with("error", "Error: " . $e->getMessage());
        }
    }

    public function getParameters($rule, $parameters)
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
                $params = null;
                break;
        }
        return $params;
    }

    public function getDataModel($rule)
    {
        $data = [];
        switch ($rule) {
            case "combination_of_products":
            case "specific_products":
                $data = Product::all();
                break;
            case "specific_categories":
            case "specific_category":
                $data = Categorie::all();
                break;
            case "specific_labels":
                $data = Label::all();
                break;
            case "specific_brands":
                $data = Brand::all();
                break;
            default:
                $data = null;
                break;
        }
        return $data;
    }

    public function update(CouponRequest $request, string $id)
    {
        $validated = $request->validated();
        $coupon = Coupon::find($id);
        if ($coupon) {
            $parametersJson = $this->filterAndEncodeParameters($request->input("parameters"));
            DB::beginTransaction();
            if (!isset($validated["active"])) $validated["active"] = 0;
            try {
                $coupon->update($validated);
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