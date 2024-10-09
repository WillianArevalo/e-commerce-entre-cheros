<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($request->product_id);
            $user = auth()->user();

            if ($product->reviews()->where('user_id', $user->id)->exists()) {
                return redirect()->route('products.details', $product->slug)->with('error', 'You have already reviewed this product');
            }

            $product->reviews()->create([
                'user_id' => $user->id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);

            DB::commit();
            return redirect()->route('products.details', $product->slug)->with('success', 'Review added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.details', $product->slug)->with('error', 'Error adding review');
        }
    }

    public function update(ReviewRequest $request, string $id)
    {
        DB::beginTransaction();
        $review = Review::findOrFail($id);
        try {
            $review->update([
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
            DB::commit();
            return redirect()->route('products.details', $review->product->slug)->with('success', 'Review updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.details', $review->product->slug)->with('error', 'Error updating review');
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        $review = Review::findOrFail($id);
        try {
            $review->delete();
            DB::commit();
            return redirect()->route('products.details', $review->product->slug)->with('success', 'Review deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.details', $review->product->slug)->with('error', 'Error deleting review');
        }
    }
}
