<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array', // Automatically cast tags to/from JSON
    ];

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // SubCategory relationship
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    // Brand relationship
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
