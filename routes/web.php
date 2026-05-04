<?php

use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SubCategoryController;
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
Route::post('/logout', [LoginController::class, 'logoutPage'])->name('logoutPage');


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

 


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::put('/subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');