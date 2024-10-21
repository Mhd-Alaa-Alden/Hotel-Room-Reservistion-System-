<?php

// app/Http/Controllers/RoomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\ConfirmedReservation;


class RoomController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $rooms = Rooms::all();
                return view('Room', compact('rooms'));
            } elseif ($usertype == 'admin') {
                $rooms = Rooms::all();
                return view('adminkit.AdminRooms', compact('rooms'));
            } else {
                return redirect()->back();
            }
        }

        $rooms = Rooms::all();
        return view('Room', compact('rooms'));
    }


    public function create()
    {
        $rooms = Rooms::all();
        return view('adminkit.rooms.createRoom', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bedRooms' => 'required|string',
            'bathRooms' => 'required|string',
            'area' => 'required|string',
            'floor' => 'required|string',
            'price' => 'required|numeric',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this line
            'avaiablity' => 'nullable',

        ]);

        if ($request->hasFile('filename')) {
            // Get the uploaded file
            $uploadedFile = $request->file('filename');

            // Generate a unique filename
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();

            // Store the file in the 'public/uploadimg' directory
            $uploadedFile->storeAs('uploadimg', $filename, 'public');
        } else {
            // If no file is present, you can set a default filename or handle it as needed
            $filename = null;
        }


        Rooms::create([
            'name' => $request->input('name'),
            'bedRooms' => $request->input('bedRooms'),
            'bathRooms' => $request->input('bathRooms'),
            'area' => $request->input('area'),
            'floor' => $request->input('floor'),
            'price' => $request->input('price'),
            'filename' => $filename, // Store the generated filename in the database
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    public function edit(Rooms $room)
    {
        return view('adminkit.rooms.editRooms', compact('room'));
    }

    public function update(Request $request, Rooms $room)
    {
        $request->validate([
            'name' => 'required|string',
            'bedRooms' => 'required|string',
            'bathRooms' => 'required|string',
            'area' => 'required|string',
            'floor' => 'required|string',
            'price' => 'required|numeric',
            'filename' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avaiablity' => 'nullable',
        ]);

        $newAvailability = $request->input('avaiablity');

    // If availability is changing to "Available" and was not previously "Available"
    if ($newAvailability == 'Avaiable' && $room->avaiablity != 'Avaiable') {
        // Check if there are any confirmed reservations for this room
        $confirmedReservations = ConfirmedReservation::where('room_id', $room->id)->get();

        // If there are confirmed reservations, delete them
        if ($confirmedReservations->isNotEmpty()) {
            foreach ($confirmedReservations as $reservation) {
                $reservation->delete();
            }
        }
    }

        if ($request->hasFile('filename')) {
            // Get the uploaded file
            $uploadedFile = $request->file('filename');

            // Generate a unique filename
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();

            // Store the file in the 'public/uploadimg' directory
            $uploadedFile->storeAs('uploadimg', $filename, 'public');

            // Delete the old image file if it exists
            if ($room->filename) {
                Storage::disk('public')->delete('uploadimg/' . $room->filename);
            }
        } else {
            // If no new file is present, update other room details without changing the image
            $filename = $room->filename;
        }

        // Update the room details
        $room->update([
            'name' => $request->input('name'),
            'bedRooms' => $request->input('bedRooms'),
            'bathRooms' => $request->input('bathRooms'),
            'area' => $request->input('area'),
            'floor' => $request->input('floor'),
            'price' => $request->input('price'),
            'filename' => $filename,
            'avaiablity' => $request->input('avaiablity'),
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }


    public function destroy(Rooms $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}
