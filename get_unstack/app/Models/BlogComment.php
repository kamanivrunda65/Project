<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $table="blog_comments";
    protected $primarykey="id";

    protected $fillable = [
        'blog_id',
        'user_id',
        'user_name',
        'comment',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function blogSubComments()
    {
        return $this->hasMany(BlogSubComment::class);
    }
}
