<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JustArrived extends Model
{
    protected $fillable = [
        'image', 
        'heading', 
        'title', 
        'prize', 
        'cancelprize', 
    ];
}
