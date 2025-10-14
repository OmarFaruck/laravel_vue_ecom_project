<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionAuthenticate;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('homePage');

Route::get('/register', [RegisterController::class, 'registrationPage'])->name('registrationPage');
Route::post('/admin/register', [RegisterController::class, 'register'])->name(name: 'register');
Route::get('/login', [LoginController::class, 'loginPage'])->name(name: 'loginPage');
Route::post('/login', [LoginController::class, 'login'])->name(name: 'login');

Route::middleware(['SessionAuthenticate'])->group(callback: function () {
    // Route::get('/', [DashboardController::class, ''])->name('');
});