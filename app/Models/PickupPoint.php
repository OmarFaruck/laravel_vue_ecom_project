<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupPoint extends Model
{
   protected $fillable = [
    'pickup_point_name',
    'pickup_point_email',
    'pickup_point_phone',
    'pickup_point_address',
    'pickup_point_city',
    'pickup_point_area',
    'pickup_point_manager_name',
    'pickup_point_manager_number',
    'pickup_point_description',
    'pickup_point_open_time',
    'pickup_point_close_time',
    'status',
];
}
