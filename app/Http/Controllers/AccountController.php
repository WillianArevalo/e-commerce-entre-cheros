<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view("account.index");
    }

    public function settings()
    {
        $auth = auth()->user();
        $user = User::with("customer")->find($auth->id);
        return view("account.settings", ["user" => $user]);
    }

    public function changePassword()
    {
        return view("account.change-password");
    }

    public function editPassword(Request $request)
    {
        $rules = [
            "password" => "required|string",
            "new-password" => "required|string",
            "confirm-password" => "required|string"
        ];
        $validated = $request->validate($rules);
        $auth = auth()->user();
        $user = User::find($auth->id);

        if (!$user) return redirect()->route("account.change-password")->with("error", "Usuario no encontrado");
        if (password_verify($validated["password"], $user->password)) {
            if ($validated["new-password"] === $validated["confirm-password"]) {
                DB::beginTransaction();
                try {
                    $user->password = Hash::make($validated["new-password"]);
                    $user->save();
                    DB::commit();
                    return redirect()->route("account.settings")->with("success", "Contraseña actualizada correctamente");
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route("account.change-password")->with("error", "Error al actualizar la contraseña");
                }
            } else {
                return redirect()->route("account.change-password")->with("error", "Las contraseñas no coinciden");
            }
        } else {
            return redirect()->route("account.change-password")->with("error", "La contraseña actual es incorrecta");
        }
    }
}
