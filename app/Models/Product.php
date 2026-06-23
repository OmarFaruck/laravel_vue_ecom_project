<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category; 
use App\Models\PickupPoint;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Models\TrendyProduct;
use App\Models\User;
use App\Models\WareHouse;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'pickup_point_id', 
        'product_slug',
        'product_view',
        'product_weight', 
        'product_name',
        'product_code',  
        'product_tags', 
        'product_video',
        'product_thumbnail', 
        'product_heading',
        'product_description',
        'product_warranty',
        'product_warranty_duration',
        'product_warranty_conditions',
        'product_return_policy',
        'product_purchase_price',
        'product_selling_price', 
        'warehouse',
        'featured',
        'today_deal', 
        'trendy_product',

        'product_color',
        'product_size',
        'product_quantity',

        'product_selling_price',
        'product_status',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id' ,'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id' ,'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id' ,'id');
    }

    public function pickupPoint()
    {
        return $this->belongsTo(PickupPoint::class, 'pickup_point_id' ,'id');
    }

    public function trendyproduct()
    {
        return $this->belongsTo(TrendyProduct::class, 'trendy_product' ,'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(WareHouse::class, 'warehouse' ,'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' ,'id');
    }


    public function productvarient()
    {
        return $this->belongsTo(ProductVariant::class);
    }

 


}
