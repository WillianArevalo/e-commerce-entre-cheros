<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('admin.index', compact('orders'));
    }

    public function login()
    {
        return view('admin.login');
    }
}
