<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;

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
        return view("admin.popups.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $popup = Popup::create($request->all());

        if ($popup) {
            return redirect()->route('admin.popups.index')->with('success', 'Popup creado correctamente');
        } else {
            return redirect()->route('admin.popups.index')->with('error', 'Error al crear el popup');
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
        //
    }
}
