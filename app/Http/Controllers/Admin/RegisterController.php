<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function registrationPage(Request $request)
    {           //allahhu@1994
    
        return Inertia::render("Admin/RegisterPage");
    }


    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        // return redirect()->route('loginPage'); 
       return redirect()->back()->with('success', 'Registration Successful');

        // try {
        //     User::create([
        //         'name'=>$request->name,
        //         'email'=>$request->email,
        //         'password'=>Hash::make($request->password)
        //     ]);

        //     return Inertia::location(route('loginPage')); // 🔥 FIX

        // } catch (\Exception $e) {
        //     return redirect()->back()->with([
        //         'error' => $e->getMessage()
        //     ]);
        // }


    }
}
