<?php

namespace App\Models;

use App\Models\ProductVariant;
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
    ];


    public function productvarient()
    {
        return $this->hasMany(ProductVariant::class);
    }


}
