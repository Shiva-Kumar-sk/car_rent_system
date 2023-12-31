<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function branch()
    {
        return $this->hasMany(Car::class,'branch_id','id');
        
    }
}
