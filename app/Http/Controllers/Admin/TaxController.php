<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function store(Request $request)
    {
        $rules = ["name" => "required|string", "rate" => "required|numeric"];
        $request->validate($rules);
        $tax = Tax::create($request->all());
        if ($tax) {
            $taxes = Tax::all();
            $html = view("layouts.__partials.ajax.admin.tax.check-tax", compact("taxes"))->render();
            return response()->json(["message" => "Impuesto creado correctamente", "html" => $html], 201);
        } else {

            return response()->json(["message" => "Error al crear el impuesto"], 400);
        }
    }
}