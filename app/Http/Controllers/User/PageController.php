<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class PageController extends Controller
{
    public function home(Request $request){
         return Inertia::render("User/UserPage");
         
    }
    public function homeproductpage(Request $request){
         return Inertia::render("User/UserPage");
         
    }
 

}
