<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\JustArrived;
use App\Models\Page;
use App\Models\Product;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopingCardController extends Controller
{
    public function shopingcard($type, $id)
    {
        if ($type === 'trendy') {
            $product = TrendyProduct::findOrFail($id);
        } elseif ($type === 'justarrived') {
            $product = JustArrived::findOrFail($id);
        } elseif ($type === 'product') {
            $product = Product::findOrFail($id);
        } else {
            abort(404);
        }

        $cart = session()->get('cart', []);
        // type + id দিয়ে unique cart key
        $cartKey = $type . '_' . $id;
        if (!isset($cart[$cartKey])) {
            $cart[$cartKey] = [
                'id' => $product->id,
                'type' => $type,
                'title' => $product->title,
                'image' => $product->image ?? $product->product_thumbnail,
                'prize' => $product->prize ?? $product->product_selling_price,
                'qty' => 1,
            ];
            session()->put('cart', $cart);
        }

        $pages = Page::get();
        $category = Category::with('subcategory')->get();
        $coupon = Coupon::get();
        return Inertia::render('User/PageShow/shoping_card', [
            'product' => $product,
            'cart' => $cart,
            'type' => $type,
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

    $coupon = Coupon::where(
        'coupon_code',
        $request->coupon_code
    )->first();

    if (!$coupon) {
        return back()->with('error', 'Invalid coupon code');
    }

    if ($coupon->valid_date < now()) {
        return back()->with('error', 'This coupon has expired');
    }

    session()->put('coupon', [
        'code' => $coupon->coupon_code,
        'amount' => $coupon->coupon_amount,
    ]);

    return back()->with([
        'success' => 'Coupon code applied successfully!',
        'coupon_amount' => $coupon->coupon_amount,
    ]);
}


    public function removeCardItem(Request $request)
    {
        $itemId = $request->input('item_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {

            unset($cart[$itemId]);

            session()->put('cart', $cart);

            return redirect()
                ->route('home')
                ->with('success', 'Item removed from cart successfully!');
        }

        return back()->with(
            'error',
            'Item not found in cart'
        );
    }

    public function cart()
{
    $cart = session()->get('cart', []);

    $coupon = session()->get('coupon', null);

    $pages = Page::get();
    $category = Category::with('subcategory')->get();

    return Inertia::render('User/PageShow/shoping_card', [
        'cart' => $cart,
        'coupon' => $coupon,
        'pages' => $pages,
        'category' => $category,
    ]);
}
    
}