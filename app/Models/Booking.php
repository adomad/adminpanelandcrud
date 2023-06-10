<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function spot()
{
    return $this->belongsTo(Spot::class);
}
public function ticket()
{
    return $this->hasOne(Ticket::class);
}


}

