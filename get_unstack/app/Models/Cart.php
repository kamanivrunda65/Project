<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
       
        'question_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
   
    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
