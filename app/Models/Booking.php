<?php

namespace App\Models;
use App\Models\Car;

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
        'cost_per_hour',
        'hours' ,
        'booking_id',
        'status'

    ];


    public function Cars()
    {
        return $this->belongsTo(Car::class);
    }
}
