<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsGeneralController extends Controller
{
    public function index()
    {
        $maintenance = Settings::where('key', 'site_in_maintenance')->first();
        return view('admin.general_settings.index', compact('maintenance'));
    }

    public function maintenanceUpdate(Request $request)
    {
        $maintenance = $request->input("site_in_maintenance");
        DB::beginTransaction();
        try {
            if (!$request->input("site_in_maintenance")) {
                $maintenance = 0;
            } else {
                $maintenance = 1;
            }
            $settings = Settings::where('key', 'site_in_maintenance')->first();
            $settings->update(['value' => $maintenance]);
            DB::commit();
            return response()->json(['success' => 'Maintenance mode updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error updating maintenance mode']);
        }
    }
}