<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    protected $fillable = [
        'heading',
        'message',
        'address_1',
        'ouremail_1',
        'phone_1',
        'address_2',
        'ouremail_2',
        'phone_2',
    ];
}
