<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_image',
        'name',
        'slug',
        'description',
        'price',
        'categories_id',
        'categories',
        'quantity',
        'availability',

    ];

    // Cast the categories attribute as an array
    protected $casts = [
        'categories' => 'array', // Laravel sẽ tự động xử lý JSON cho cột này
    ];

    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }
}
