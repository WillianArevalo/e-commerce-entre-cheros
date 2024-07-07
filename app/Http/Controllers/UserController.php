<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile("profile")) {
            $validated["profile_photo_path"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
        }
        $user = User::create($validated);
        if ($user) {
            return redirect()->route("admin.users.index")->with("success", "Usuario agregado correctamente");
        } else {
            return redirect()->route("admin.users.index")->with("error", "Error al agregar el usuario");
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
        $user = User::find($id);
        return view("admin.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::find($id);
        if ($user) {
            $validate = $request->validated();
            if ($request->hasFile("profile")) {
                if ($user->profile_photo_path) {
                    ImageHelper::deleteImage($user->profile_photo_path);
                }
                $validate["profile_photo_path"] = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
            }

            if ($request->input("password")) {
                $validate["password"] = Hash::make($request->input("password"));
            } else {
                $validate["password"] = $user->password;
            }

            $user->update($validate);
            return redirect()->route("admin.users.index")->with("success", "Usuario editado correctamente");
        } else {
            return redirect()->route("admin.users.index")->with("error", "Usuario no encontrado");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {

            if ($user->profile_photo_path) {
                ImageHelper::deleteImage($user->profile_photo_path);
            }
            $user->delete();
            return redirect()->route("admin.users.index")->with("success", "Usuario eliminado correctamente");
        } else {
            return redirect()->route("admin.users.index")->with("error", "Error al eliminar el usuario");
        }
    }
}
