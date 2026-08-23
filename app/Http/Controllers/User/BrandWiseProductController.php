<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; 
use App\Models\Brand;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandWiseProductController extends Controller
{
    public function brandproduct(Request $request, $id)
    {
         $category = Category::with('subcategory')->get(); 
         $pages = Page::get();

         $subcategory = SubCategory::with('product')->get();

         $trendyproduct = TrendyProduct::get();

         $justarrived = JustArrived::get();
        
         $ProductPages = Product::where('brand_id', $id)->get();
         $brand = Brand::findOrFail($id);
    

        return Inertia::render('User/PageShow/brand_product', [
         'brandId' => $id,
         'category' => $category,
         'pages' => $pages,
         'subcategory' => $subcategory,
         'justarrived' => $justarrived,
         'ProductPages' => $ProductPages, 
         'brand' => $brand, 
         
        ]);
    }
}
