<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcart extends Model
{
    use HasFactory;
    protected $table="blogcarts";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'blog_id',

    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function blogss()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
