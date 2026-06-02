<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code',
        'valid_date',
        'type',
        'coupon_amount',
        'status',
    ];
}
