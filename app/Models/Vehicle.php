<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rate;
use App\Models\Car;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'fuel_type',
        'features',
        'mileage',
        'seating_capacity',
        'image',
        'branch_id',
    ];


    public function Vehicle_rate()
    {
        return $this->hasOne(Rate::class,'vehicle_id','id');
    }

    public function car()
    {
        return $this->hasMany(Car::class,'vehicle_id','id');
        
    }
}
