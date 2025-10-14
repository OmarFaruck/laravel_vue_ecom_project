<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function registrationPage(Request $request){
           $email=$request->session()->get('email','default');
           if($email != 'default') {
            // return redirect()->route('DashboardPage');
            return redirect()->route(route: 'loginPage');
        }
          return Inertia::render("Admin/RegisterPage");

    }

    
    public function register(Request $request){
        try {
            $email=$request->input('email');
            $name=$request->input('name');
            // $role='user';
            $password=$request->input('password');

            User::create([
                'name'=>$name,
                'email'=>$email,
                // 'role'=>$role,
                'password'=>Hash::make($password)
            ]);

            session()->flash('message', 'Registration Successful');
            session()->flash('status', true);
            session()->flash('error', '');

            // return  redirect()->route('registrationPage');
            return  redirect()->route('loginPage');
        }
        catch (\Exception $e) {
            session()->flash('message', 'Registration Fail');
            session()->flash('status', false);
            session()->flash('error', $e->getMessage());
        }

    }


   
}
