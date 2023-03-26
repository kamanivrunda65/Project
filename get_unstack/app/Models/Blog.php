<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'user_name',
        'blog_title',
        'blog_content',
        'category',
        'tags',
        'image',
        'comments',

    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }
    public function blogSubComments()
    {
        return $this->hasMany(BlogSubComment::class);
    }
}
