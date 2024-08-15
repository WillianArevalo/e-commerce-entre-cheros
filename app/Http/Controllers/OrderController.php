<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showOrdersStore()
    {
        return view("orders.index");
    }

    public function index()
    {
        return view("admin.orders.index");
    }
}