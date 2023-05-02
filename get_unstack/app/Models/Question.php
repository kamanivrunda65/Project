<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table="questions";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'questions',
        'tags',
        'discription',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function answerComments()
    {
        return $this->hasMany(AnswerComment::class);
    }
    public function questionComments()
    {
        return $this->hasMany(QuestionComment::class);
    }
    public function questionvotes()
    {
        return $this->hasMany(Questionvote::class);
    }
    
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
