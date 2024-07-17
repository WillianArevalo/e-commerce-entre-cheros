<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view("admin.brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required|string",
            "description" => "nullable|string"
        ];
        $request->validate($rules);
        $brand = Brand::create($request->all());
        if (!$brand) {
            return back()->with("error", "No se pudo crear la marca");
        }
        return back()->with("success", "Marca creada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return back()->with("error", "No se pudo encontrar la marca");
        }
        return response()->json(["brand" => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "name" => "required|string",
        ];
        $request->validate($rules);
        $brand = Brand::find($id);
        if (!$brand) {
            return back()->with("error", "No se pudo encontrar la marca");
        }
        $brand->update($request->all());
        return back()->with("success", "Marca actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return back()->with("error", "No se pudo eliminar la marca");
        }
        $brand->delete();
        return back()->with("success", "Marca eliminada correctamente");
    }


    public function search(Request $request)
    {
        $query = Brand::query();
        if ($request->input("inputSearch")) {
            $name = $request->input("inputSearch");
            $query->where("name", "like", "%$name%");
        }

        $brands = $query->get();
        if ($request->ajax()) {
            return view("layouts.__partials.ajax.row-brand", compact("brands"))->render();
        }
    }
}