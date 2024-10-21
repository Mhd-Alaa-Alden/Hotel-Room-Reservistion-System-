<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedReservation;
use App\Models\Reservation;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $confirmedReservations = ConfirmedReservation::all();
        $rooms = Rooms::all();
        $income = ConfirmedReservation::join('rooms', 'confirmed_reservations.room_id', '=', 'rooms.id')
            ->sum('rooms.price');
        $roomnum = ConfirmedReservation::count();
        $reservation = ConfirmedReservation::sum('room_id->price');
        

        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            $users = User::where('usertype', 'admin')->get();
            if ($usertype == 'user') {
                return view('home', compact('rooms'));
            } elseif ($usertype == 'admin') {
                return view('adminkit.adminHome', compact('rooms', 'income', 'roomnum', 'reservation', 'confirmedReservations'));
            }
            elseif ($usertype == 'manager'){
                return view('Manager.ManagerHome' ,compact('users'));
            }
        }

        return view('home', compact('rooms'));
    }
}
