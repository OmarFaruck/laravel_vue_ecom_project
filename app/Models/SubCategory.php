<?php

namespace App\Models;

use App\Models\Category; 
use App\Models\Product; 
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
        protected $fillable = [
            'name',
            'category_id',
        ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

public function product()
{
    return $this->hasMany(Product::class, 'subcategory_id');
}

     

  
}
