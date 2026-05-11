<?php
 
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSliderController;
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

// category Page
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


// subcategory Page
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::put('/subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');


// subcategory Page
Route::get('/page_create', [AdminPageController::class, 'index'])->name('page_create.index');
Route::get('/page_create/create', [AdminPageController::class, 'create'])->name('page_create.create');
Route::post('/page_create', [AdminPageController::class, 'store'])->name('page_create.store');
Route::get('/page_create/{id}/edit', [AdminPageController::class, 'edit'])->name('page_create.edit');
Route::put('/page_create/{id}', [AdminPageController::class, 'update'])->name('page_create.update');
Route::delete('/page_create/{id}', [AdminPageController::class, 'destroy'])->name('page_create.destroy');


// home slider Page
Route::get('/homeslider', [HomeSliderController::class, 'index'])->name('home_slider.index');
Route::get('/homeslider/create', [HomeSliderController::class, 'create'])->name('home_slider.create');
Route::post('/homeslider', [HomeSliderController::class, 'store'])->name('home_slider.store');
Route::get('/homeslider/{id}/edit', [HomeSliderController::class, 'edit'])->name('home_slider.edit');
Route::put('/homeslider/{id}', [HomeSliderController::class, 'update'])->name('home_slider.update');
Route::delete('/homeslider/{id}', [HomeSliderController::class, 'destroy'])->name('home_slider.destroy');


// brand Page
Route::get('/brandpage', [BrandController::class, 'index'])->name('brand_page.index');
Route::get('/brandpage/create', [BrandController::class, 'create'])->name('brand_page.create');
Route::post('/brandpage', [BrandController::class, 'store'])->name('brand_page.store');
Route::get('/brandpage/{id}/edit', [BrandController::class, 'edit'])->name('brand_page.edit');
Route::put('/brandpage/{id}', [BrandController::class, 'update'])->name('brand_page.update');
Route::delete('/brandpage/{id}', [BrandController::class, 'destroy'])->name('brand_page.destroy');