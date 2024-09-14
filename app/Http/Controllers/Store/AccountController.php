<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountUpdateRequest;
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
        return view("account.settings.index", ["user" => $user]);
    }

    public function settingsEdit()
    {
        $auth = auth()->user();
        $user = User::with("customer")->find($auth->id);
        return view("account.settings.settings-edit", ["user" => $user]);
    }

    public function settingsUpdate(AccountUpdateRequest $request)
    {
        $validated = $request->validated();
        $auth = auth()->user();
        $user = User::find($auth->id);
        if (!$user) return redirect()->route("account.settings-edit")->with("error", "Usuario no encontrado");
        DB::beginTransaction();
        try {
            $user->update($validated);
            if ($user->customer) {
                $user->customer->update($validated);
            } else {
                $user->customer()->create($validated);
            }
            DB::commit();
            return redirect()->route("account.settings")->with("success", "Datos actualizados correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("account.settings-edit")->with("error", "Error al actualizar los datos. Error: " . $e->getMessage());
        }
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