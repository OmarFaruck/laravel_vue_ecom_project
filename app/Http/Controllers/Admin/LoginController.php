<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     public function loginPage(Request $request){
        
          return Inertia::render("Admin/LoginPage");

    }

    public function login(Request $request)
{
    $user = User::where('email', $request->input('email'))->first();

    if ($user && Hash::check($request->input('password'), $user->password)) {

        $request->session()->regenerate();

        $request->session()->put('email', $user->email);
        $request->session()->put('user_id', $user->id);
        $request->session()->put('name', $user->name);

        session()->flash('message', 'Login Successful');
        session()->flash('status', true);

        // ✅ ✅ Main Fix: usertype অনুযায়ী redirect
        if ($user->usertype == '1') { 
            // ✅ Admin
            return redirect()->route('AdminPage');
        } else { 
            // ✅ Normal User 
            return redirect()->route('HomeProductPage');
        }
    }

    // Login failed
    return back()->with([
        'message' => 'Login Failed',
        'status' => false,
        'error' => 'Invalid email or password'
    ]);
}   

    function logoutPage(Request $request){
//        echo 'logout'; exit;
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');

    }    
           
        

        
      

      
}
