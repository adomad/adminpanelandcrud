<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['name', 'description', 'capacity'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    

    
}

