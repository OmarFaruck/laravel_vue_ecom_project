<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category; 
use App\Models\Collection;
use App\Models\HomeSlider;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PageController extends Controller
{
    public function home(Request $request){
    
    $category = Category::with('subcategory')->get();
    $subcategory = SubCategory::with('product')->get(); //not complete
    $pages = Page::get();
    $homeslider = HomeSlider::get();
    $collections = Collection::get();
    $trendyproduct = TrendyProduct::get(); 
    $trendyproducts = TrendyProduct::first();  //name
    $justarrived = JustArrived::get();  
    $justarriveds = JustArrived::first();  //name
    $brand = Brand::get();    
 
    // dd($trendyproduct);
         return Inertia::render("User/UserPage",[
          'category' => $category,
          'pages' => $pages,
          'homeslider' => $homeslider,
          'collections' => $collections,
          'subcategory' => $subcategory,
          'trendyproduct' => $trendyproduct,
          'trendyproducts' => $trendyproducts,   //name
          'justarrived' => $justarrived,   
          'justarriveds' => $justarriveds,   //name
          'brand' => $brand,   
         ]);
         
    }

    public function homeproductpage(Request $request){
     $category = Category::with('subcategory')->get();
     $subcategory = SubCategory::with('product')->get();  // not complete
     $page = Page::get();
     $homeslider = HomeSlider::get();
     $trendyproduct = TrendyProduct::get();
     $trendyproducts = TrendyProduct::first();  //name
     $justarrived = JustArrived::get();  
     $justarriveds = JustArrived::first();  //name
     $brand = Brand::get(); 

         return Inertia::render("User/UserPage",[
          'category' => $category,
          'pages' => $pages,
          'homeslider' => $homeslider,
          'collections' => $collections,
          'subcategory' => $subcategory,
          'trendyproduct' => $trendyproduct,
          'trendyproducts' => $trendyproducts,  //name
          'justarrived' => $justarrived,   
          'justarriveds' => $justarriveds,  //name
           'brand' => $brand
         ]);
         
    }
 

}
