<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\ContactAddressController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\JustArrivedController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\StayUpdateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TrendyProductController;
use App\Http\Controllers\Admin\WareHouseController;
use App\Http\Controllers\User\CategoryWisePageController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ShopDetailController;
use App\Http\Controllers\User\ShopingCardController;
use App\Http\Controllers\User\SocialController;
use App\Http\Controllers\User\UserContactController;
use App\Http\Controllers\User\UserNewsLetterController;
use App\Http\middleware\AdminOnly;
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


Route::get('/', [PageController::class, 'home'])->name('home');


Route::middleware([SessionAuthenticate::class])->group(function () {
    // ✅ Admin route
    Route::get('/admin/dashboard', [DashboardController::class, 'AdminPage'])
        ->name('AdminPage');

    // ✅ User route
    // Route::get('/', [PageController::class, 'home'])
    //     ->name('homePage');
    Route::get('/homeproduct/pages', [PageController::class, 'homeproductpage'])->name('HomeProductPage');

        //Admin Only Routes
        Route::prefix('admin')->middleware(AdminOnly::class)->group(function () {

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


            // Admin Page
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



            // Collection Page
            Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');
            Route::get('/collection/create', [CollectionController::class, 'create'])->name('collection.create');
            Route::post('/collection', [CollectionController::class, 'store'])->name('collection.store');
            Route::get('/collection/{id}/edit', [CollectionController::class, 'edit'])->name('collection.edit');
            Route::put('/collection/{id}', [CollectionController::class, 'update'])->name('collection.update');
            Route::delete('/collection/{id}', [CollectionController::class, 'destroy'])->name('collection.destroy');


            // Trendy Products Page
            Route::get('/trendyproducts', [TrendyProductController::class, 'index'])->name('trendy_products.index');
            Route::get('/trendyproducts/create', [TrendyProductController::class, 'create'])->name('trendy_products.create');
            Route::post('/trendyproducts', [TrendyProductController::class, 'store'])->name('trendy_products.store');
            Route::get('/trendyproducts/{id}/edit', [TrendyProductController::class, 'edit'])->name('trendy_products.edit');
            Route::put('/trendyproducts/{id}', [TrendyProductController::class, 'update'])->name('trendy_products.update');
            Route::delete('/trendyproducts/{id}', [TrendyProductController::class, 'destroy'])->name('trendy_products.destroy');


            // Just Arrived Page
            Route::get('/justarrived', [JustArrivedController::class, 'index'])->name('just_arrived.index');
            Route::get('/justarrived/create', [JustArrivedController::class, 'create'])->name('just_arrived.create');
            Route::post('/justarrived', [JustArrivedController::class, 'store'])->name('just_arrived.store');
            Route::get('/justarrived/{id}/edit', [JustArrivedController::class, 'edit'])->name('just_arrived.edit');
            Route::put('/justarrived/{id}', [JustArrivedController::class, 'update'])->name('just_arrived.update');
            Route::delete('/justarrived/{id}', [JustArrivedController::class, 'destroy'])->name('just_arrived.destroy');


             // Coupon Code Page
            Route::get('/CouponCode', [CouponController::class, 'index'])->name('coupon_code.index');
            Route::get('/CouponCode/create', [CouponController::class, 'create'])->name('coupon_code.create');
            Route::post('/CouponCode', [CouponController::class, 'store'])->name('coupon_code.store');
            Route::get('/CouponCode/{id}/edit', [CouponController::class, 'edit'])->name('coupon_code.edit');
            Route::put('/CouponCode/{id}', [CouponController::class, 'update'])->name('coupon_code.update');
            Route::delete('/CouponCode/{id}', [CouponController::class, 'destroy'])->name('coupon_code.destroy');

            // Page Setting Page
            Route::get('/PageSetting', [PageSettingController::class, 'index'])->name('page_setting.index');
            Route::get('/PageSetting/create', [PageSettingController::class, 'create'])->name('page_setting.create');
            Route::post('/PageSetting', [PageSettingController::class, 'store'])->name('page_setting.store');
            Route::get('/PageSetting/{id}/edit', [PageSettingController::class, 'edit'])->name('page_setting.edit');
            Route::put('/PageSetting/{id}', [PageSettingController::class, 'update'])->name('page_setting.update');
            Route::delete('/PageSetting/{id}', [PageSettingController::class, 'destroy'])->name('page_setting.destroy');

            // Pickup Point Page
            Route::get('/PickupPoint', [PickupPointController::class, 'index'])->name('pickup_point.index');
            Route::get('/PickupPoint/create', [PickupPointController::class, 'create'])->name('pickup_point.create');
            Route::post('/PickupPoint', [PickupPointController::class, 'store'])->name('pickup_point.store');
            Route::get('/PickupPoint/{id}/edit', [PickupPointController::class, 'edit'])->name('pickup_point.edit');
            Route::put('/PickupPoint/{id}', [PickupPointController::class, 'update'])->name('pickup_point.update');
            Route::delete('/PickupPoint/{id}', [PickupPointController::class, 'destroy'])->name('pickup_point.destroy');

            // SeoController  Page
            Route::get('/SeoPage', [SeoController::class, 'index'])->name('seo_page.index');
            Route::get('/SeoPage/create', [SeoController::class, 'create'])->name('seo_page.create');
            Route::post('/SeoPage', [SeoController::class, 'store'])->name('seo_page.store');
            Route::get('/SeoPage/{id}/edit', [SeoController::class, 'edit'])->name('seo_page.edit');
            Route::put('/SeoPage/{id}', [SeoController::class, 'update'])->name('seo_page.update');
            Route::delete('/SeoPage/{id}', [SeoController::class, 'destroy'])->name('seo_page.destroy');

            // TicketController  Page
            Route::get('/TicketPage', [TicketController::class, 'index'])->name('ticket_page.index');
            Route::get('/TicketPage/create', [TicketController::class, 'create'])->name('ticket_page.create');
            Route::post('/TicketPage', [TicketController::class, 'store'])->name('ticket_page.store');
            Route::get('/TicketPage/{id}/edit', [TicketController::class, 'edit'])->name('ticket_page.edit');
            Route::put('/TicketPage/{id}', [TicketController::class, 'update'])->name('ticket_page.update');
            Route::delete('/TicketPage/{id}', [TicketController::class, 'destroy'])->name('ticket_page.destroy');


            // WareHouseController  Page
            Route::get('/WareHousePage', [WareHouseController::class, 'index'])->name('warehouse_page.index');
            Route::get('/WareHousePage/create', [WareHouseController::class, 'create'])->name('warehouse_page.create');
            Route::post('/WareHousePage', [WareHouseController::class, 'store'])->name('warehouse_page.store');
            Route::get('/WareHousePage/{id}/edit', [WareHouseController::class, 'edit'])->name('warehouse_page.edit');
            Route::put('/WareHousePage/{id}', [WareHouseController::class, 'update'])->name('warehouse_page.update');
            Route::delete('/WareHousePage/{id}', [WareHouseController::class, 'destroy'])->name('warehouse_page.destroy');

            // ProductController  Page
            Route::get('/ProductPage', [ProductController::class, 'index'])->name('product_page.index');
            Route::get('/ProductPage/create', [ProductController::class, 'create'])->name('product_page.create');
            Route::post('/ProductPage', [ProductController::class, 'store'])->name('product_page.store');
            Route::get('/ProductPage/{id}/edit', [ProductController::class, 'edit'])->name('product_page.edit');
            Route::put('/ProductPage/{id}', [ProductController::class, 'update'])->name('product_page.update');
            Route::delete('/ProductPage/{id}', [ProductController::class, 'destroy'])->name('product_page.destroy');


            // ProductVariantController  Page not yet done
            Route::get('/ProductVariant', [ProductVariantController::class, 'index'])->name('product_variant_page.index');
            Route::get('/ProductVariant/create', [ProductVariantController::class, 'create'])->name('product_variant_page.create');
            Route::post('/ProductVariant', [ProductVariantController::class, 'store'])->name('product_variant_page.store');
            Route::get('/ProductVariant/{id}/edit', [ProductVariantController::class, 'edit'])->name('product_variant_page.edit');
            Route::put('/ProductVariant/{id}', [ProductVariantController::class, 'update'])->name('product_variant_page.update');
            Route::delete('/ProductVariant/{id}', [ProductVariantController::class, 'destroy'])->name('product_variant_page.destroy');

        });

   
  });
  
 
//Dynamin fontend Navber Page Open Controller
Route::get('/page/{slug}', [PageController::class, 'pageshow'])->name('page.show');   


Route::post('/user_newsletter', [UserNewsLetterController::class, 'usernewsletter'])->name('newsletter');  
Route::post('/user_subscribe', [UserNewsLetterController::class, 'subscribe'])->name('subscribe');  
Route::post('/user_contact', [UserContactController::class, 'usercontact'])->name('user_contact');  

  // Sideber CategoryWisePage Controller
Route::get('/user/{slug}', [CategoryWisePageController::class, 'categorywisepage'])->name('user.SideberPage');  
 
//trendy shop_detail page Controller
Route::get('/page/trendy_shop_detail/{id}', [ShopDetailController::class, 'trendyshopdetail'])->name('page.trendy_shop_detail');

//justArrived shop_detail page Controller
Route::get('/page/just_arrived_shop_detail/{id}', [ShopDetailController::class, 'arrivedshopdetail'])->name('page.just_arrived_shop_detail');


//Product shop_detail page Controller
Route::get('/page/product_shop_detail/{id}', [ShopDetailController::class, 'productshopdetail'])->name('page.product_shop_detail');
 
//ReviewController  Controller
Route::get('/review/{id}', [ReviewController::class,'review'])->name('review');
Route::post('/review', [ReviewController::class,'store'])->name('review.store');


//ShopingCardController  Controller
Route::get('/page/add_to_cart/{id}', [ShopingCardController::class,'shopingcard'])->name('shoping_card');
Route::post('/apply-coupon', [ShopingCardController::class, 'applyCoupon'])->name('apply.coupon');
 Route::post('/remove-from-cart', [ShopingCardController::class, 'removeCardItem'])->name('remove.from.cart');
// Route::get('/cheack_out', [ShopingCardController::class,'cheack_out'])->name('cheack_out');
// Route::get('/order_success', [ShopingCardController::class,'order_success'])->name('order_success');
// Route::get('/order_failed', [ShopingCardController::class,'order_failed'])->name('order_failed');
 



// Stay Update Page
    Route::get('/stayupdate', [StayUpdateController::class, 'index'])->name('stay_update.index');
    Route::get('/stayupdate/create', [StayUpdateController::class, 'create'])->name('stay_update.create');
    Route::post('/stayupdate', [StayUpdateController::class, 'store'])->name('stay_update.store');
    Route::get('/stayupdate/{id}/edit', [StayUpdateController::class, 'edit'])->name('stay_update.edit');
    Route::put('/stayupdate/{id}', [StayUpdateController::class, 'update'])->name('stay_update.update');
    Route::delete('/stayupdate/{id}', [StayUpdateController::class, 'destroy'])->name('stay_update.destroy');

// Newsletter Page
    Route::get('/newsletter', [NewsLetterController::class, 'index'])->name('news_letter.index');
    Route::get('/newsletter/create', [NewsLetterController::class, 'create'])->name('news_letter.create');
    Route::post('/newsletter', [NewsLetterController::class, 'store'])->name('news_letter.store');
    Route::get('/newsletter/{id}/edit', [NewsLetterController::class, 'edit'])->name('news_letter.edit');
    Route::put('/newsletter/{id}', [NewsLetterController::class, 'update'])->name('news_letter.update');
    Route::delete('/newsletter/{id}', [NewsLetterController::class, 'destroy'])->name('news_letter.destroy');

// Contact Us Page
    Route::get('/contactus', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::get('/contactus/create', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::post('/contactus', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::get('/contactus/{id}/edit', [ContactUsController::class, 'edit'])->name('contact_us.edit');
    Route::put('/contactus/{id}', [ContactUsController::class, 'update'])->name('contact_us.update');
    Route::delete('/contactus/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');


// Contact Address Page
    Route::get('/contactaddress', [ContactAddressController::class, 'index'])->name('contact_address.index');
    Route::get('/contactaddress/create', [ContactAddressController::class, 'create'])->name('contact_address.create');
    Route::post('/contactaddress', [ContactAddressController::class, 'store'])->name('contact_address.store');
    Route::get('/contactaddress/{id}/edit', [ContactAddressController::class, 'edit'])->name('contact_address.edit');
    Route::put('/contactaddress/{id}', [ContactAddressController::class, 'update'])->name('contact_address.update');
    Route::delete('/contactaddress/{id}', [ContactAddressController::class, 'destroy'])->name('contact_address.destroy');

    // Categories Wise Product Controller





