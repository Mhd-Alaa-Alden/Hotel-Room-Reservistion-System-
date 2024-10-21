<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationRejection;
use App\Models\Rooms;
use Illuminate\Support\Facades\Mail;
use App\Models\ConfirmedReservation;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::all();
        $selectedRoom = Rooms::find($request->input('room_id'));
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            $rooms = Rooms::all();

            if ($usertype == 'admin') {
                return view('adminkit.Reservations.showReservations', compact('reservations'));
            } else {
                return view('book', compact('rooms', 'selectedRoom'));
            }
        }

        return redirect()->route('login')->with('success', 'Reservation status updated successfully');
    }




    // Inside your controller method to confirm reserva


    public function store(Request $request)
    {
        $rooms = Rooms::all();
        $selectedRoom = Rooms::find($request->input('room_id'));
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment' => 'required|string',
            'note' => 'nullable|string',
            'room_id' => 'required|exists:rooms,id'
        ]);

        Reservation::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'payment' => $request->input('payment'),
            'note' => $request->input('note'),
            'room_id' => $request->input('room_id'),
        ]);


        return redirect()->route('home')->with(compact('rooms', 'selectedRoom'))->with('success', 'Reservation created successfully');
    }

    public function edit(Reservation $reservation)
    {
        return view('book.edit', compact('reservation'));
    }

    // Update the method
    public function update(Request $request, $id)
    {
        // Fetch the reservation
        $reservation = Reservation::findOrFail($id);

        // Update the status
        $reservation->update(['status' => $request->status]);



        // Send confirmation or rejection email
        if ($request->status == 1) {
            // Confirmation
            Mail::to($reservation->email)->send(new ReservationConfirmation(['user' => $reservation]));

            if ($request->status == 1) {
                // Set all rooms to "Unavaiable"
                $room = $reservation->room;
                $room->update(['avaiablity' => 'Unavaiable']);
                ConfirmedReservation::create($reservation->toArray());
                $confirmedReservations = ConfirmedReservation::all();
                $reservation->delete();
            }
        } elseif ($request->status == 2) {
            // Rejection
            Mail::to($reservation->email)->send(new ReservationRejection(['user' => $reservation]));

            // Remove the reservation from the database if rejected
            $reservation->delete();
        }

        return redirect()->back()->with('success', 'Reservation status updated successfully');
    }
}
