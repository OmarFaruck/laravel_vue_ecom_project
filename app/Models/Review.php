<?php

namespace App\Models;

use App\Models\JustArrived;
use App\Models\TrendyProduct;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'rating',
    ];

    public function trendyproduct()
    {
        return $this->belongsTo(TrendyProduct::class, 'trendyproduct_id', 'id');
    }

    public function justarrived()
    {
        return $this->belongsTo(JustArrived::class, 'justarrived_id', 'id');
    }
}
