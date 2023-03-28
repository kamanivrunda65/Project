<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table="answers";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'user_name',
        'question_id',
        'answer',
       
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
    public function answerComments()
    {
        return $this->hasMany(AnswerComment::class);
    }
    public function answervotes()
    {
        return $this->hasMany(Answervotes::class);
    }
}
