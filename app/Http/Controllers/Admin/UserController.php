<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\UserRequest;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::all();
        return view("admin.users.create", compact("currencies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile("profile")) {
            $validated["profile"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
        }
        DB::beginTransaction();
        try {
            $user = User::create($validated);
            DB::commit();
            if ($user) {
                return redirect()->route("admin.users.index")->with("success", "Usuario agregado correctamente");
            } else {
                return redirect()->route("admin.users.index")->with("error", "Error al agregar el usuario");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.users.index")->with("error", "Error al agregar el usuario");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return view("admin.users.show", compact("user"));
        } else {
            return redirect()->route("admin.users.index")->with("error", "Usuario no encontrado");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $currencies = Currency::all();
        return view("admin.users.edit", ["user" => $user, "currencies" => $currencies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::findOrFail($id);

        if ($request->hasFile("profile")) {
            if ($user->profile && $user->profile !== "images/default-profile.webp") {
                ImageHelper::deleteImage($user->profile);
            }
            $validated["profile"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        DB::beginTransaction();
        try {
            $user->update($validated);
            DB::commit();
            return redirect()->route("admin.users.index")->with("success", "Usuario actualizado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.users.index")->with("error", "Error al actualizar el usuario. Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        DB::beginTransaction();
        try {
            if (!$user) {
                return redirect()->route("admin.users.index")->with("error", "Usuario no encontrado");
            }
            if ($user->profile) {
                ImageHelper::deleteImage($user->profile);
            }
            $user->delete();
            DB::commit();
            return redirect()->route("admin.users.index")->with("success", "Usuario eliminado correctamente");
        } catch (\Exception $e) {
            return redirect()->route("admin.users.index")->with("error", "Error al eliminar el usuario. Error: " . $e->getMessage());
        }
    }
}