<?php

// app/Models/Reservation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'payment',
        'note', 'status', 'room_id',
    ];

    function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
