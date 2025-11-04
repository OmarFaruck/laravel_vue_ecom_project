<?php

use Illuminate\Support\Facades\Route; 
use App\Http\middleware\SessionAuthenticate;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoriController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [PageController::class, 'home'])->name('homePage');

Route::get('/register', [RegisterController::class, 'registrationPage'])->name('registrationPage');
Route::post('/admin/register', [RegisterController::class, 'register'])->name(name: 'register');
Route::get('/login', [LoginController::class, 'loginPage'])->name(name: 'loginPage');


Route::post('/login', [LoginController::class, 'login'])->name(name: 'login');

Route::get('/logout', [LoginController::class, 'logoutPage'])->name(name: 'logoutPage');

 
Route::middleware([SessionAuthenticate::class])->group(function () {
    // ✅ Admin route
    Route::get('/admin/dashboard', [DashboardController::class, 'AdminPage'])
        ->name('AdminPage');

    // ✅ User route
    Route::get('/', [PageController::class, 'home'])
        ->name('homePage');

});

//  Route::get('/admin/dashboard', [DashboardController::class, 'AdminPage'])->name('AdminPage');

Route::resource('/category', CategoriController::class);
