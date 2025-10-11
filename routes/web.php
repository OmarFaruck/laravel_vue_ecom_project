<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'login']);