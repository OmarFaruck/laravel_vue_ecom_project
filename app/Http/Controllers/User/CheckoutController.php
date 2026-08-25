<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function checkout(Request $request){

        //  $cart = session()->get('cart', []);

        // $coupon = session()->get('coupon', null);

        $pages = Page::get();
        $product = Product::get();
        $category = Category::with('subcategory')->get();

        return Inertia::render('User/PageShow/cheack_out', [
            // 'cart' => $cart,
            // 'coupon' => $coupon,
            'pages' => $pages,
            'category' => $category,
            'product' => $product,
        ]);

    }
}
