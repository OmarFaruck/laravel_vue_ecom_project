<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page; 
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Inertia\Inertia;

class CategoryWisePageController extends Controller
{
    public function categorywisepage($slug){
    
      $category = Category::with('subcategory')->get();
      $categories = Category::with('subcategory')->where('slug', $slug)->firstOrFail();
      $pages = Page::get(); 
      $subcategory = SubCategory::with('product')->get(); 
      $trendyproduct = TrendyProduct::get(); 
      // $trendyproducts = TrendyProduct::where('slug', $slug)->firstOrFail();
      $justarrived = JustArrived::get();  
      // $justarriveds = JustArrived::where('slug', $slug)->firstOrFail();  
 
      return Inertia::render('User/SideberPage/CategoryWisePage', [
        'category' => $category, 
        'pages' => $pages, 
        'subcategory' => $subcategory,
        'categories' => $categories,
        'trendyproduct' => $trendyproduct, 
        // 'trendyproducts' => $trendyproducts, 
        'justarrived' => $justarrived,
        // 'justarriveds' => $justarriveds,
    ]);
    
    }
}
    