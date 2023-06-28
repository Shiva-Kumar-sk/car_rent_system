<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'cost',
        
    ];


    public function Rate()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
