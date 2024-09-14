<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Models\User;
use App\Utils\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = Addresses::getAddresses();
        return view("admin.settings.index", ["user" => $user, "addresses" => $addresses]);
    }

    public function changeColor(Request $request)
    {
        $auth = Auth::user();
        DB::beginTransaction();
        try {
            $user = User::find($auth->id);
            $user->color = $request->input("color");
            $user->update();
            DB::commit();
            return response()->json([
                "success" => "Tema actualizado",
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el tema"], 500);
        }
    }

    public function changeTheme(Request $request)
    {
        $auth = Auth::user();
        DB::beginTransaction();
        try {
            $user = User::find($auth->id);
            $user->theme = $request->input("theme");
            $user->update();
            DB::commit();
            return response()->json(["success" => "Tema actualizado"], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el tema"], 500);
        }
    }

    public function changeProfilePhoto(Request $request)
    {
        $auth = Auth::user();
        DB::beginTransaction();
        try {
            $user = User::find($auth->id);
            $img = $user->profile;
            if ($request->hasFile("profile")) {
                if ($user->profile !== "images/default-profile.png") {
                    ImageHelper::deleteImage($user->profile);
                    $img = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
                } else {
                    $img = ImageHelper::saveImage($request->file("profile"), "images/profile-photos");
                }
            }
            $user->profile = $img;
            $user->update();
            DB::commit();
            return response()->json([
                "success" => "Foto de perfil actualizada",
                "html" => view("layouts.__partials.ajax.admin.settings.profile-photo", compact("user"))->render()
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar la foto de perfil"], 500);
        }
    }
}