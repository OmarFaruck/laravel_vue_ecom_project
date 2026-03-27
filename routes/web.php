<?php

use App\Http\Controllers\Admin\CategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\SocialController;
use App\Http\middleware\SessionAuthenticate;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [PageController::class, 'home'])->name('homePage');

Route::get('/register', [RegisterController::class, 'registrationPage'])->name('registrationPage');
Route::post('/admin/register', [RegisterController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/logout', [LoginController::class, 'logoutPage'])->name('logoutPage');


Route::get('/auth/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');


Route::middleware([SessionAuthenticate::class])->group(function () {
    // ✅ Admin route
    Route::get('/admin/dashboard', [DashboardController::class, 'AdminPage'])
        ->name('AdminPage');

    // ✅ User route
    // Route::get('/', [PageController::class, 'home'])
    //     ->name('homePage');
    Route::get('/homeproduct/pages', [PageController::class, 'homeproductpage'])
        ->name('HomeProductPage');
});

Route::resource('/category', CategoriController::class);


Route::get('/', [PageController::class, 'home'])->name('home');
