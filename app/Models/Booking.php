<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'mobile',
        'pick_up_date',
        'drop_of_date',
        'money',
        'hours' ,
        'booking_id',
        'status'

    ];
}
