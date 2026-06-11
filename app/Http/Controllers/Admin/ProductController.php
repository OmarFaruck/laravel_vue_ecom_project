<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category; 
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use App\Models\User;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Product/ProductPage', [
            'ProductPage' => Product::all(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'pickupPoints' => PickupPoint::all(),
            'warehouses' => WareHouse::all(),
            'trendyProducts' => TrendyProduct::all(),
            'users' => User::all(), 
        ]);
    }

    public function create(Request $request)
    {
        // return Inertia::render('Admin/Product/ProductPage', [
        //     'users' => User::all(),
        //     'categories' => Category::all(),
        //     'subcategories' => SubCategory::all(),
        //     'brands' => Brand::all(),
        //     'pickupPoints' => PickupPoint::all(),
        //     'warehouses' => WareHouse::all(),
        //     'trendyProducts' => TrendyProduct::all(), 
        // ]);
    }

    public function store(Request $request)
    { 
        

    $data = $request->validate([
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'brand_id' => 'required',
        'pickup_point_id' => 'required',

        'product_slug' => 'required|unique:products,product_slug',

        'product_view' => 'required|integer',
        'product_weight' => 'required|numeric',

        'product_name' => 'required',

        'product_code' => 'required|unique:products,product_code',
        'product_tags' => 'required',

        'product_video' => 'required|file|mimes:mp4,mov,avi|max:51200',
        'product_thumbnail' => 'required|image|max:10240',

        'product_heading' => 'required',
        'product_description' => 'required',

        'product_warranty' => 'required',
        'product_warranty_duration' => 'required|integer',
        'product_warranty_conditions' => 'required',

        'product_return_policy' => 'required',

        'product_purchase_price' => 'required|numeric',
        'product_selling_price' => 'required|numeric',

        'warehouse' => 'required',
        'featured' => 'required',
        'today_deal' => 'required',
        'trendy_product' => 'required',

        'product_status' => 'required',
        'user_id' => 'required',
    ]);

    // Upload Video
    $videoPath = null;
    if ($request->hasFile('product_video')) {
        $videoPath = $request->file('product_video')
            ->store('products/videos', 'public');
    }

    // Upload Thumbnail
    $thumbnailPath = null;
    if ($request->hasFile('product_thumbnail')) {
        $thumbnailPath = $request->file('product_thumbnail')
            ->store('products/thumbnails', 'public');
    }

    Product::create([
        'category_id' => $data['category_id'],
        'subcategory_id' => $data['subcategory_id'],
        'brand_id' => $data['brand_id'],
        'pickup_point_id' => $data['pickup_point_id'],

        'product_slug' => $data['product_slug'],
        'product_view' => $data['product_view'],
        'product_weight' => $data['product_weight'],

        'product_name' => $data['product_name'],
        'product_code' => $data['product_code'],
        'product_tags' => $data['product_tags'],

        'product_video' => $videoPath,
        'product_thumbnail' => $thumbnailPath,

        'product_heading' => $data['product_heading'],
        'product_description' => $data['product_description'],

        'product_warranty' => $data['product_warranty'],
        'product_warranty_duration' => $data['product_warranty_duration'],
        'product_warranty_conditions' => $data['product_warranty_conditions'],

        'product_return_policy' => $data['product_return_policy'],

        'product_purchase_price' => $data['product_purchase_price'],
        'product_selling_price' => $data['product_selling_price'],

        'warehouse' => $data['warehouse'],
        'featured' => $data['featured'],
        'today_deal' => $data['today_deal'],
        'trendy_product' => $data['trendy_product'],

        'product_status' => $data['product_status'],
        'user_id' => $data['user_id'],
    ]);


        
        return redirect()->route('product_page.index');
    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return Inertia::render('Admin/Product/EditProduct', [
            'product' => $product,
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'pickupPoints' => PickupPoint::all(),
            'warehouses' => WareHouse::all(),
            'trendyProducts' => TrendyProduct::all(), 
        ]);

    }

    public function update(Request $request)
    {
       
            $productdata = $request->validate([
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'brand_id' => 'required',
                'pickup_point_id' => 'required',
    
                'product_slug' => 'required|unique:products,product_slug,' . $request->id,
    
                'product_view' => 'required|integer',
                'product_weight' => 'required|numeric',
    
                'product_name' => 'required',
    
                'product_code' => 'required|unique:products,product_code,' . $request->id,
                'product_tags' => 'required',
    
                'product_video' => 'nullable|file|mimes:mp4,mov,avi|max:51200',
                'product_thumbnail' => 'nullable|image|max:10240',
    
                'product_heading' => 'required',
                'product_description' => 'required',
    
                'product_warranty' => 'required',
                'product_warranty_duration' => 'required|integer',
                'product_warranty_conditions' => 'required',
    
                'product_return_policy' => 'required',
    
                'product_purchase_price' => 'required|numeric',
                'product_selling_price' => 'required|numeric',
    
                'warehouse' => 'required',
                'featured' => 'required',
                'today_deal' => 'required',
                'trendy_product' => 'required',
    
                'product_status' => 'required',
                'user_id' => 'required',

            ]);
    
            $product = Product::findOrFail($request->id);
    
            // Upload Video
            if ($request->hasFile('product_video')) {
                $videoPath = $request->file('product_video')
                    ->store('products/videos', 'public');
            } else {
                $videoPath = $product->product_video;
            }
    
            // Upload Thumbnail
            if ($request->hasFile('product_thumbnail')) {
                $thumbnailPath = $request->file('product_thumbnail')
                    ->store('products/thumbnails', 'public');
            } else {
                $thumbnailPath = $product->product_thumbnail;
            }
    
            $product->update([
                'category_id' => $productdata['category_id'],
                'subcategory_id' => $productdata['subcategory_id'],
                'brand_id' => $productdata['brand_id'],
                'pickup_point_id' => $productdata['pickup_point_id'],
    
                'product_slug' => $productdata['product_slug'],
                'product_view' => $productdata['product_view'],
                'product_weight' => $productdata['product_weight'],
    
                'product_name' => $productdata['product_name'],
                'product_code' => $productdata['product_code'],
                'product_tags' => $productdata['product_tags'],
    
                'product_video' => $videoPath,
                'product_thumbnail' => $thumbnailPath,
    
                'product_heading' => $productdata['product_heading'],
                'product_description' => $productdata['product_description'],
    
                'product_warranty' => $productdata['product_warranty'],
                'product_warranty_duration' => $productdata['product_warranty_duration'],
                'product_warranty_conditions' => $productdata['product_warranty_conditions'],
    
                'product_return_policy' => $productdata['product_return_policy'],
    
                'product_purchase_price' => $productdata['product_purchase_price'],
                'product_selling_price' => $productdata['product_selling_price'],
    
                'warehouse' => $productdata['warehouse'],
                'featured' => $productdata['featured'],
                'today_deal' => $productdata['today_deal'],
                'trendy_product' => $productdata['trendy_product'],
    
                'product_status' => $productdata['product_status'],
                'user_id' => $productdata['user_id'],
            ]);

            return redirect()->route('product_page.index');
    }


    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect()->route('product_page.index');
    }

    
}