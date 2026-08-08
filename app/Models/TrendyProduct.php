<?php

namespace App\Models;

use App\Models\ProductVariant;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;

class TrendyProduct extends Model
{
    protected $fillable = [
        'image', 
        'heading', 
        'title', 
        'prize', 
        'cancelprize', 
        'product_color', 
        'product_size', 
        'description',
        'slug', 
    ];


    public function productvarient()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'trendyproduct_id', 'id');
    }


}
