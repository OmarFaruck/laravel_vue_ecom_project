<?php

namespace App\Models;

use App\Models\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
