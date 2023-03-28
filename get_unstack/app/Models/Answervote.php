<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answervote extends Model
{
    use HasFactory;
    protected $table="answervotes";
    protected $primarykey="id";
    protected $fillable = [
        'user_id',
        
        'answer_id'
       
       
    ];


    public function answers()
    {
        return $this->belongsTo(Answer::class,'answer_id');
    }
}
