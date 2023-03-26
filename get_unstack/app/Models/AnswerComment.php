<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    use HasFactory;
    protected $table="answer_comments";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        'question_id',
        'user_name',
        'answer_id',
        'comment',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
    public function answers()
    {
        return $this->belongsTo(Answer::class,'answer_id');
    }
}
