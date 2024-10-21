<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedReservation extends Model
{
    use HasFactory;

    protected $table = 'confirmed_reservations';

    protected $fillable = [
        'name', 'email', 'phone', 'payment',
        'note', 'status', 'room_id',
    ];

    function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    // Add other model properties and methods as needed
}
