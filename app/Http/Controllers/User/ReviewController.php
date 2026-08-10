<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function review($id)
    {
 
        $review = Review::where('id', $id)->firstOrFail();
        $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail();
        //    $trendyproduct = JustArrived::where('id', $id)->firstOrFail();
 
        $review = Review::where('trendy_product_id', $id)->latest()->get();
        $reviewCount = $review->count();

    $averageRating = $review->avg('rating');
        $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail(); 
        $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
        $pages = Page::get();
        return Inertia::render("User/PageShow/review", [
            'review' => $review,
 
 
             'reviewCount' => $reviewCount,
        'averageRating' => round($averageRating ?? 0, 1), 
            'trendyproduct' => $trendyproduct,
            'category' => $category,
            'subcategory' => $subcategory,
            'pages' => $pages,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
 
            'trendy_product_id' => 'required|exists:trendy_products,id' 

        ]);

        Review::create([
            'message' => $data['message'],
            'name' => $data['name'],
            'email' => $data['email'],
            'rating' => $data['rating'],
 
        ]);

        session()->flash('message', 'thanks for your review');
        session()->flash('status', true);
        return back();
  
       

         return back()->with([
        'message' => 'Thanks for your review!',
        'status' => true,
    ]); 
    }
}
