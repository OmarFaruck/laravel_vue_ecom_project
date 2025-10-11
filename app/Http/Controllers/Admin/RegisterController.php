<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(){
      
          return Inertia::render("Admin/RegisterPage");
          
    }
    public function login(){
          return Inertia::render("Admin/LoginPage");
          
    }
}
