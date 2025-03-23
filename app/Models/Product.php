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
}
