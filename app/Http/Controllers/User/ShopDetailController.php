<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JustArrived;
use App\Models\Page;
 
use App\Models\Product;
  
use App\Models\Review; 
use App\Models\TrendyProduct;
use Inertia\Inertia;

class ShopDetailController extends Controller
{
   
    public function productdetail($type, $id)
{
    if ($type === 'trendy') {
        $product = TrendyProduct::findOrFail($id);
        $product->image_url =
            '/storage/trendyproducts/' . $product->image;
    } elseif ($type === 'justarrived') {
        $product = JustArrived::findOrFail($id);
        $product->image_url =
            '/storage/justarrived/' . $product->image;
    } elseif ($type === 'product') {

       $product = Product::findOrFail($id);
        $product->image_url =
            '/storage/' . $product->product_thumbnail;
    } else {
        abort(404);
    }

    $pages = Page::get();
    $category = Category::with('subcategory')->get();
    $reviews = Review::where('trendy_product_id', $id)->get();

    // You May Also Like
    $trendyProducts = TrendyProduct::get()->map(function ($item) {
      $item->image_url =
            '/storage/trendyproducts/' . $item->image;
        return $item;
    });
    $justArrivedProducts = JustArrived::get()->map(function ($item) {

        $item->image_url =
            '/storage/justarrived/' . $item->image;
        return $item;
    });
    $products = Product::get()->map(function ($item) {

        $item->image_url =
            '/storage/' . $item->product_thumbnail;
        return $item;
    });

    return Inertia::render('User/PageShow/shop_detail', [
        'product' => $product,
        'type' => $type,
        'pages' => $pages,
        'category' => $category,
        'reviews' => $reviews,
        'trendyProducts' => $trendyProducts,
        'justArrivedProducts' => $justArrivedProducts,
        'products' => $products,
    ]);
}

}
 
 
