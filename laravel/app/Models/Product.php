<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'price',
        'category_id',
        'image'
    ];
    protected $attributes =[
        'image' => ' '
    ];

    protected $with = ['category'];

    public function category(){ //category_id
        //hasOne, hasMany, belongsTO, belongToMany
        return $this->belongsTo(Category::class);
    

    }
}
