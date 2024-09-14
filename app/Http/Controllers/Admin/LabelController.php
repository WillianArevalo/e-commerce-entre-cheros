<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function store(Request $request)
    {

        $rules = ["name" => "required|string"];
        $request->validate($rules);

        $label = Label::create($request->all());
        if ($label) {
            $labels = Label::all();
            $html = view("layouts.__partials.ajax.admin.label.option-label", compact("labels"))->render();
            return response()->json(["message" => "Impuesto creado correctamente", "html" => $html], 201);
        } else {
            return response()->json(["message" => "Error al crear el impuesto"], 400);
        }
    }
}