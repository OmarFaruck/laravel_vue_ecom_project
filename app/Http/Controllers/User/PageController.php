<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category; 
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PageController extends Controller
{
    public function home(Request $request){
    
    $category = Category::with('subcategory')->get();
    $pages = Page::get();

         return Inertia::render("User/UserPage",[
          'category' => $category,
          'pages' => $pages 
         ]);
         
    }

    public function homeproductpage(Request $request){
      $category = Category::with('subcategory')->get();
     $page = Page::get();

         return Inertia::render("User/UserPage",[
          'category' => $category,
          'pages' => $pages 
         ]);
         
    }
 

}
