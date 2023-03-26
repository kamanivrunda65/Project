<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubComment extends Model
{
    use HasFactory;
    protected $table="blog_sub_comments";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'blog_id',
        'comment_id',
        'user_name',
        'subcomment',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function blogComments()
    {
        return $this->belongsTo(BlogComment::class,'comment_id');
    }
}
