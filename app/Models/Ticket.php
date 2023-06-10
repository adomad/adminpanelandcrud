<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_id', 'booking_id'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
