<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return "Show login form";
    }

    public function validateAdmin(LoginAdminRequest $request)
    {
        $credentials = $request->only("email", "password");
        $user = User::where("email", $credentials["email"])->first();

        if (!$user) {
            return redirect()->back()->with("error", "Usuario no encontrado")->withInput(request()->only("email"));
        }

        if (!Hash::check($credentials["password"], $user->password)) {
            return redirect()->back()->with("error", "Contraseña incorrecta")->withInput(request()->only("email"));
        }

        Auth::login($user);
        return redirect()->route("admin.index");
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect("/admin/login");
    }
}
