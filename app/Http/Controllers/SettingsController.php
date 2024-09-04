<?php

namespace App\Http\Controllers;

use App\Enums\ThemeColor;
use App\Helpers\ImageHelper;
use App\Models\User;
use App\Utils\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
            $colorTheme = "";
            switch ($request->input("color")) {
                case "blue":
                    $colorTheme = ThemeColor::BLUE;
                    break;
                case "green":
                    $colorTheme = ThemeColor::GREEN;
                    break;
                case "red":
                    $colorTheme = ThemeColor::RED;
                    break;
                case "yellow":
                    $colorTheme = ThemeColor::YELLOW;
                    break;
                case "purple":
                    $colorTheme = ThemeColor::PURPLE;
                    break;
                case "orange":
                    $colorTheme = ThemeColor::ORANGE;
                    break;
                case "pink":
                    $colorTheme = ThemeColor::PINK;
                    break;
                default:
                    $colorTheme = ThemeColor::BLUE;
            }
            $user->update();
            DB::commit();
            return response()->json([
                "success" => "Tema actualizado",
                "light" => $colorTheme["light"] ?? null,
                "dark" => $colorTheme["dark"] ?? null,
                "hover" => $colorTheme["hover"] ?? null
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
