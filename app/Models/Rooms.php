<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    // app/Models/Room.php
    use HasFactory;

    protected $fillable = [
        'name',
        'bedRooms',
        'bathRooms',
        'area',
        'floor',
        'price',
        'filename', // Add this line
        'avaiablity',
    ];

    function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    function confirmedReservation()
    {
        return $this->hasMany(ConfirmedReservation::class);
    }
}
