<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        
        'review'
       
       
    ];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
