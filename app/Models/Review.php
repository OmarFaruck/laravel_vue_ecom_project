<?php

namespace App\Models;

use App\Models\JustArrived;
use App\Models\Product;
use App\Models\TrendyProduct;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [
    'message',
    'name',
    'email',
    'rating', 
];

    public function trendyproduct() { 
        return $this->belongsTo( TrendyProduct::class, 
        'trendy_product_id', 
        'id' 
        ); 
    } 

    public function justarrived() { 
        return $this->belongsTo( JustArrived::class, 
        'justarrived_id', 
        'id' 
        ); 
    }

        public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }



    
}