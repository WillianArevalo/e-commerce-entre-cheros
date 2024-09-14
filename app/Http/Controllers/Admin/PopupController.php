<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\RouteHelper;
use App\Http\Requests\PopupRequest;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popups = Popup::all();
        return view("admin.popups.index", compact("popups"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = RouteHelper::getRoutes();
        return view("admin.popups.create", compact("routes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PopupRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $popup = Popup::create($validated);
            if ($popup) {
                DB::commit();
                return redirect()->route('admin.popups.index')->with('success', 'Popup creado correctamente');
            } else {
                return redirect()->route('admin.popups.index')->with('error', 'Error al crear el popup');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.popups.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $popup = Popup::find($id);
        if ($popup) {
            return response()->json(["popup" => $popup]);
        } else {
            return response()->json(["error" => "Popup no encontrado"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $popup = Popup::find($id);
            if ($popup) {
                $popup->delete();
                DB::commit();
                return redirect()->route('admin.popups.index')->with('success', 'Anuncio eliminado correctamente');
            } else {
                return redirect()->route('admin.popups.index')->with('error', 'Error al eliminar el anuncio');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.popups.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}