<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table="bookings";
    protected $primarykey="id";
    protected $fillable = [
        'username',
        'booking_date',
        'day_type',
       
    ];
}
