<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_number',
        'user_id',
        'subject',
        'message',
        'priority',
        'status',
        'attachment_image',
        'admin_reply',
    ];
}
