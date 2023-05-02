<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table="notifications";
    protected $primary_key="id";
    protected $fillable = [
        'user_id',
        'msg',
        'pic',
        'link',
        'status',
        
    ];
}
