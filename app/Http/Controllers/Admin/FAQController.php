<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view("admin.faq.index", compact("faqs"));
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
        $rules = ["question" => "required|string", "answer" => "required|string"];
        $validated = $request->validate($rules);
        $faq = Faq::create($validated);
        if ($faq) {
            return redirect()->route("admin.faq.index")->with("success", "FAQ creada correctamente");
        } else {
            return redirect()->route("admin.faq.index")->with("error", "No se pudo crear la FAQ");
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
        $faq = Faq::find($id);
        if (!$faq) {
            return back()->with("error", "No se pudo encontrar la FAQ");
        }
        return response()->json(["faq" => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ["question" => "required|string", "answer" => "required|string"];
        $validated = $request->validate($rules);
        $faq = Faq::find($id);
        if (!$faq) {
            return back()->with("error", "No se pudo encontrar la FAQ");
        }
        $faq->update($validated);
        return redirect()->route("admin.faq.index")->with("success", "FAQ actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);
        if (!$faq) {
            return back()->with("error", "No se pudo encontrar la FAQ");
        }
        $faq->delete();
        return redirect()->route("admin.faq.index")->with("success", "FAQ eliminada correctamente");
    }
}