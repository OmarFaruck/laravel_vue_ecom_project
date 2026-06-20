<?php

namespace App\Models;
 
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

  
}
