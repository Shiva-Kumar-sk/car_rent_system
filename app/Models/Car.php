<?php

namespace App\Models;
use App\Models\Vehicle;
use App\Models\Store;
use App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function car1()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function branch1()
    {
        return $this->belongsTo(Store::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class,'car_id','id');
        
    }
}
