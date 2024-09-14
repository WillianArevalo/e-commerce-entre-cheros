<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class SaleStrategyController extends Controller
{
    public function index()
    {
        $coupons = Coupon::with("rule")->get();
        return view("admin.sales_strategies.index", ["coupons" => $coupons]);
    }
}