<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\TrendyProduct; 
use Inertia\Inertia;

class ShopingCardController extends Controller
{
    public function shopingcard($id){

         $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail();
         
        $pages = Page::get();
        $category = Category::with('subcategory')->get();
 
        return Inertia::render('User/PageShow/shoping_card', [
            'trendyproduct' => $trendyproduct,
            
            'pages' => $pages,
            'category' => $category,
            ]);
    }
}
