<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = [
     'warehouse_name',
     'warehouse_code',
     'warehouse_email',
     'warehouse_phone',
     'warehouse_address',
     'warehouse_city',
     'warehouse_districk',
     'warehouse_area',
     'warehouse_manager_name',
     'warehouse_manager_number',
     'warehouse_description',
     'status',
    ];
}
