<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_color',
        'product_size',
        'product_quantity',
        'product_selling_price',
        'product_image',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function subcategory()
{
    return $this->belongsTo(SubCategory::class, 'subcategory_id');
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
