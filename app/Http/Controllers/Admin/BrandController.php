<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        DB::beginTransaction();
        try {
            $brand = Brand::create($request->all());
            if ($request->hasFile("logo")) {
                $brand->logo = ImageHelper::saveImage($request->file("logo"), "brands/logos");
            }
            if ($request->hasFile("banner")) {
                $brand->banner = ImageHelper::saveImage($request->file("banner"), "brands/banners");
            }
            $brand->save();
            DB::commit();
            return back()->with("success", "Marca creada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "No se pudo crear la marca");
        }
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
        $brand["logo"] = Storage::url($brand->logo);
        $brand["banner"] = Storage::url($brand->banner);
        return response()->json(["brand" => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $brand = Brand::find($id);
            if (!$brand) {
                return back()->with("error", "No se pudo encontrar la marca");
            }
            $brand->update($request->all());
            if ($request->hasFile("logo")) {
                ImageHelper::deleteImage($brand->logo);
                $brand->logo = ImageHelper::saveImage($request->file("logo"), "brands/logos");
            }
            if ($request->hasFile("banner")) {
                ImageHelper::deleteImage($brand->banner);
                $brand->banner = ImageHelper::saveImage($request->file("banner"), "brands/banners");
            }
            $brand->save();
            DB::commit();
            return back()->with("success", "Marca actualizada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "No se pudo actualizar la marca");
        }
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
            return view("layouts.__partials.ajax.admin.brand.row-brand", compact("brands"))->render();
        }
    }
}