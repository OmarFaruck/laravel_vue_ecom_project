<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use Symfony\Component\HttpFoundation\Response;


class SessionAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //      $email=$request->session()->get('email','default');
    //     $user_id=$request->session()->get('user_id','default');

    //     if($email=="default"){
    //         // return redirect('/admin/login');
    //         return redirect('/login');
    //     }
    //     else{
    //         $request->headers->set('email',$email);
    //         $request->headers->set('id',$user_id);
    //         return $next($request);
    //     }
    // }

    public function handle(Request $request, Closure $next)
{
    $email = $request->session()->get('email');
    $user_id = $request->session()->get('user_id');

    // ✅ Not logged in → login page
    if (!$email || !$user_id) {
        return redirect()->route('loginPage');
    }

    $user = User::find($user_id);

    if (!$user) {
        return redirect()->route('loginPage');
    }

    // ✅ Admin user
    if ($user->usertype == '1') {

        // ✅ Admin allowed route → admin/*
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // ✅ Otherwise admin dashboard redirect
        return redirect()->route('AdminPage');
    }

    // ✅ Normal user
    if ($user->usertype == '0') {

        // ✅ user allowed: home page only
        if ($request->is('/homeproduct/pages') || $request->routeIs(patterns: 'HomeProductPage')) {
            return $next($request);
        }

        return redirect()->route('HomeProductPage');
    }

    return $next($request);
}
}
