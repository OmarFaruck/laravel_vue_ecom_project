<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $fillable = [
        'page_name',
        'page_slug',
        'page_title',
        'page_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'page_position',
        'status',
    ];
}
