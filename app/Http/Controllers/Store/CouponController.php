<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Coupon;


class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::where("type", "general")->where("active", 1)->get();
        return view("coupons.index", compact("coupons"));
    }
}