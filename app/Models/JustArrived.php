<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;

class JustArrived extends Model
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

    public function review()
    {
        return $this->hasMany(Review::class, 'justarrived_id', 'id');
    }
}
