<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    use HasFactory;
    protected $table="question_comments";
    protected $primarykey="id";


    protected $fillable = [
        'question_id',
        'user_id',
        'user_name',
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
}
