<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Inertia\Inertia;

class ShopDetailController extends Controller
{

    // trendyshopdetail
    public function trendyshopdetail($id){

         $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
         $review = Review::get();

       return Inertia::render("User/PageShow/trendy_shop_detail",[

        'trendyproduct' => $trendyproduct,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
        'review' => $review,

       ]);
    }

    // Just arrived shopdetail
    public function arrivedshopdetail($id){

         $justarrived = JustArrived::where('id', $id)->firstOrFail();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
         $review = Review::get();

       return Inertia::render("User/PageShow/arrived_shop_detail",[

        'justarrived' => $justarrived,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
         'review' => $review,

       ]);
    }


     // Product shop detail
    public function productshopdetail($id){

         $justarrived = JustArrived::where('id', $id)->firstOrFail();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
         $review = Review::get();
         $product = Product::where('id', $id)->firstOrFail();

       return Inertia::render("User/PageShow/product_shop_detail",[

        'justarrived' => $justarrived,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
         'review' => $review,
         'product' => $product,

       ]);
    }
}
