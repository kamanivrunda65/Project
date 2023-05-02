<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $primarykey="id";
    protected $fillable = [
        'product_name',
        'discription',
        'price',
        'category_id',
        'image',
        

    ];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
