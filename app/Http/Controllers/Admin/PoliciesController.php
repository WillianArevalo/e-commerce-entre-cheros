<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PoliciesController extends Controller
{
    public function index()
    {
        $policies = Policy::all();
        return view('admin.policies.index', compact("policies"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|mimes:pdf',
        ]);
        $filename = $request->file("file_path")->getClientOriginalName();
        $filePath = $request->file('file_path')->storeAs('policies', $filename, 'public');
        DB::beginTransaction();
        try {
            Policy::create([
                'name' => $request->name,
                'file_path' => $filePath,
            ]);
            DB::commit();
            return redirect()->route('admin.policies.index')->with('success', 'Policy created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.policies.index')->with('error', 'An error occurred while creating the policy');
        }
    }

    public function destroy(string $id)
    {
        $policy = Policy::find($id);
        if ($policy) {
            DB::beginTransaction();
            try {
                $pdfPath = storage_path('app/public/' . $policy->file_path);
                if (file_exists($pdfPath)) {
                    unlink($pdfPath);
                }
                $policy->delete();
                DB::commit();
                return redirect()->route('admin.policies.index')->with('success', 'Policy deleted successfully');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.policies.index')->with('error', 'An error occurred while deleting the policy');
            }
        }
        return redirect()->route('admin.policies.index')->with('error', 'Policy not found');
    }

    public function showPolicy(string $slug)
    {
        $policy = Policy::where('slug', $slug)->first();
        if ($policy && Storage::disk('public')->exists($policy->file_path)) {
            $fileContent = Storage::disk('public')->get($policy->file_path);
            return Response::make($fileContent, 200, [
                'Content-Type' => "application/pdf",
                'Content-Disposition' => 'inline; filename="' . basename($policy->file_path) . '"'
            ]);
        }
        return redirect()->route('home')->with('error', 'Policy not found');
    }

    public function download(string $id)
    {
        $policy = Policy::find($id);
        if ($policy && Storage::disk('public')->exists($policy->file_path)) {
            return Storage::disk("public")->download($policy->file_path, basename($policy->file_path));
        }
        return redirect()->route('home')->with('error', 'Policy not found');
    }
}