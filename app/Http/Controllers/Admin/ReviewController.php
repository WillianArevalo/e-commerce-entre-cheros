<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();
        return view("admin.reviews.index", compact("reviews"));
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $review = Review::find($id);
            $review->delete();
            DB::commit();
            return redirect()->route("admin.reviews.index")->with("success", "Review deleted successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.reviews.index")->with("error", "Error deleting review");
        }
    }

    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $review = Review::find($id);
            $review->update($request->all());
            DB::commit();
            return redirect()->route("admin.reviews.index")->with("success", "Review updated successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.reviews.index")->with("error", "Error updating review");
        }
    }

    public function edit(string $id)
    {
        $review = Review::find($id);
        return response()->json([
            "review" => $review
        ]);
    }

    public function changeStatus(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $review = Review::find($id);

            if ($request->status == 0) {
                $review->approved_at = null;
                $review->rejected_at = null;
                $review->approved_by = null;
                $review->rejected_by = null;
                $review->reason = null;
            } else if ($request->status == 1) {
                $review->approved_at = now();
                $review->approved_by = auth()->id();
                $review->reason = null;
                $review->rejected_at = null;
                $review->rejected_by = null;
            } else if ($request->status == 2) {
                $review->approved_at = null;
                $review->approved_by = null;
                $review->rejected_at = now();
                $review->rejected_by = auth()->id();
            }

            $review->is_approved = $request->status;
            $review->save();
            DB::commit();
            return redirect()->route("admin.reviews.index")->with("success", "Review status changed successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.reviews.index")->with("error", "Error changing review status. Error: " . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $review = Review::with("user", "product")->find($id);
        return response()->json([
            "html" => view(
                "layouts.__partials.ajax.admin.review.show-review",
                [
                    "review" => $review
                ]
            )->render()
        ]);
    }
}
