<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    public function index()
    {
        return view('admin.policies.index');
    }
}