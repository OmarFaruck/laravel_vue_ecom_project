<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [RegisterController::class, 'registrationPage'])->name('registrationPage');
Route::post('/admin/register', [RegisterController::class, 'register'])->name(name: 'register');
Route::get('/login', [RegisterController::class, 'login']);