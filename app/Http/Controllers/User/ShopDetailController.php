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

         $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail();
         $trendyproducts = TrendyProduct::all();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
         $reviews = Review::where('trendy_product_id', $id)->get();
         $reviewCount = $reviews->count();
          

       return Inertia::render("User/PageShow/trendy_shop_detail",[

        'trendyproduct' => $trendyproduct,
 
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
        'review' => $review,
 
         'trendyproducts' => $trendyproducts,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
        'reviews' => $reviews,
        'reviewCount' => $reviewCount, 

       ]);
    }

    // Just arrived shopdetail
    public function arrivedshopdetail($id){

         $justarrived = JustArrived::where('id', $id)->firstOrFail();
 
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
         $review = Review::get();
 
         $justarriveds = JustArrived::get();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
           $reviews = Review::where('trendy_product_id', $id)->get();
         $reviewCount = $reviews->count(); 

       return Inertia::render("User/PageShow/arrived_shop_detail",[

        'justarrived' => $justarrived,
 
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
         'review' => $review,
 
         'justarriveds' => $justarriveds,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
          'reviews' => $reviews,
        'reviewCount' => $reviewCount,
 

       ]);
    }


     // Product shop detail
    public function productshopdetail($id){

         $justarrived = JustArrived::where('id', $id)->firstOrFail();
         $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
         $pages = Page::get();
 
         $review = Review::get();
 
         $reviews = Review::where('trendy_product_id', $id)->get();
         $reviewCount = $reviews->count(); 
         $product = Product::where('id', $id)->firstOrFail();
         $products = Product::get();

       return Inertia::render("User/PageShow/product_shop_detail",[

        'justarrived' => $justarrived,
         'category' => $category,
         'subcategory' => $subcategory,
         'pages' => $pages,
 
         'review' => $review,
 
         'reviews' => $reviews,
         'reviewCount' => $reviewCount, 
         'product' => $product,
         'products' => $products,

       ]);
    }
}
 
 
