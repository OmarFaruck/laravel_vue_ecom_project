<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Page;
use App\Models\TrendyProduct; 
use Inertia\Inertia;
use Illuminate\Http\Request;

class ShopingCardController extends Controller
{
    public function shopingcard($type, $id){

         $trendyproduct = TrendyProduct::where('id', $id)->firstOrFail();

    // Cart session
    $cart = session()->get('cart', []);

    // Product cart-এ না থাকলে add করবে
    if (!isset($cart[$id])) {
        $cart[$id] = [
            'id' => $trendyproduct->id,
            'title' => $trendyproduct->title,
            'image' => $trendyproduct->image,
            'prize' => $trendyproduct->prize,
            'qty' => 1,
        ];

        session()->put('cart', $cart);
    }

    $pages = Page::get();
    $category = Category::with('subcategory')->get();
    $coupon = Coupon::get();

    return Inertia::render('User/PageShow/shoping_card', [
        'trendyproduct' => $trendyproduct,
        'pages' => $pages,
        'category' => $category,
        'coupon' => $coupon,
    ]);
    }

    public function applyCoupon(Request $request)
{
    $request->validate([
        'coupon_code' => 'required|string',
    ]);

    $couponCode = $request->input('coupon_code');

    // Validate the coupon code
    $coupon = Coupon::where('coupon_code', $couponCode)->first();

    if (!$coupon) {
        return redirect()->back()->with('error', 'Invalid coupon code');
    }

    // Check if the coupon is still valid
    if ($coupon->valid_date < now()) {
        return redirect()->back()->with('error', 'This coupon has expired');
    }

    // Apply your logic here (e.g., calculate discount)

    return redirect()->back()->with('success', 'Coupon code applied successfully!');
}


public function removeCardItem(Request $request)
{
     $itemId = $request->input('item_id');

    $cart = session()->get('cart', []);

    if (isset($cart[$itemId])) {

        unset($cart[$itemId]);

        session()->put('cart', $cart);

        return redirect()
            ->route('shoping_card', ['id' => array_key_first($cart) ?? $itemId])
            ->with('success', 'Item removed from cart successfully!');
    }

    return back()->with(
        'error',
        'Item not found in cart'
    );
}
}