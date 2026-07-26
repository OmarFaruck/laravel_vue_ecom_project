<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Product;
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
 
      $ProductPages = Product::where('category_id', $categories->id)->get();
      $justarrived = JustArrived::get();

      return Inertia::render('User/SideberPage/CategoryWisePage', [
        'category' => $category,
        'pages' => $pages,
        'subcategory' => $subcategory,
        'categories' => $categories,
        'justarrived' => $justarrived,
        'ProductPages' => $ProductPages,
    ]);

    }
}
