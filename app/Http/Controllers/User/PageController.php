<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\ContactAddress;
use App\Models\ContactUs;
use App\Models\HomeSlider;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PageController extends Controller
{
    public function home(Request $request){
 
    $category = Category::with('subcategory')->get();
    $subcategory = SubCategory::with('product')->get();
    $pages = Page::get();
    $homeslider = HomeSlider::get();
    $collections = Collection::get();
    $trendyproduct = TrendyProduct::get();
    $trendyproducts = TrendyProduct::first();  //name
    $justarrived = JustArrived::get();
    $justarriveds = JustArrived::first();  //name
    $brand = Brand::get();
    $productvarient = ProductVariant::get();
    // $productvarient = ProductVariant::with(['product', 'subcategory'])->get();


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
          'productvarient' => $productvarient,
         ]);

    }

    public function homeproductpage(Request $request){

        $category = Category::with('subcategory')->get();
        $subcategory = SubCategory::with('product')->get();
        $pages = Page::get();
        $homeslider = HomeSlider::get();
        $collections = Collection::get();
        $trendyproduct = TrendyProduct::get();
        $trendyproducts = TrendyProduct::first();  //name
        $justarrived = JustArrived::get();
        $justarriveds = JustArrived::first();  //name
        $brand = Brand::get();
        $productvarient = ProductVariant::get();


         return Inertia::render("User/UserPage",[
          'category' => $category,
          'pages' => $pages,
          'homeslider' => $homeslider,
          'collections' => $collections,
          'subcategory' => $subcategory,
          'trendyproduct' => $trendyproduct,
          'trendyproducts' => $trendyproducts, //name
          'justarrived' => $justarrived,
          'justarriveds' => $justarriveds, //name
          'brand' => $brand,
          'productvarient' => $productvarient,
         ]);

    }

    //Dynamic Navber Page Open Controller
    public function pageshow($slug){

       $pagename = Page::where('slug', $slug)->firstOrFail();
        //dynamin page create name
         $pageallowed = [ 'shop','shop_detail','contact' ,'shoping_card','cheack_out'];
       if (!in_array($slug,$pageallowed)) {
        abort(404);
       }

       $pages = Page::get();
       $category = Category::with('subcategory')->get();
 
       $justarrived = JustArrived::get();
       $trendyproduct = TrendyProduct::get();
       $ProductPages = Product::get();

 
       $justarrived = JustArrived::get(); 
       $trendyproduct = TrendyProduct::get(); 
       $productpage = Product::get();
       $contactaddress = ContactAddress::first();
       $contactus = ContactUs::get();
       $product = Product::all();
        // $products = Product::where('category_id', $id)->first();

       return Inertia::render("User/PageShow/{$slug}",[
        'pagename'=>$pagename,
        'pages' => $pages,
        'category' => $category,
 
        'justarrived' => $justarrived,
        'trendyproduct' => $trendyproduct,
        'ProductPages' => $ProductPages,
 
        'justarrived' => $justarrived, 
        'trendyproduct' => $trendyproduct, 
        'productpage' => $productpage, 
        'contactaddress' => $contactaddress, 
        'contactus' => $contactus,
        'product' => $product,  
        // 'products' => $products,

       ]);
    }
 

}
