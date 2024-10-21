<!-- In AdminRooms.blade.php or any other relevant view file -->
@extends('adminkit.layouts.app')
@section('title')
    Room Manager
@endsection
@section('content')
    <a class="btn btn-primary btn-lg m-4" href="{{ route('rooms.create') }}">{{ __('Add Room') }}</a>
    <div class="container">

        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm" style="border-radius: 10px;">
                        <img src="../storage/uploadimg/{{ $room->filename }}" alt="{{ $room->name }}"
                            style="object-fit: cover; height: 200px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #007bff;">{{ $room->name }}</h5>
                            <p class="card-text">
                                Bed Rooms: {{ $room->bedRooms }}<br>
                                Bath Rooms: {{ $room->bathRooms }}<br>
                                Area: {{ $room->area }} m<br>
                                Floor: {{ $room->floor }}<br>
                                Price: ${{ $room->price }}
                            </p>
                            <!-- Add any other details you want to display -->

                            <!-- Example: Add a link to view more details -->

                            <!-- Edit Button -->
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-success">Edit</a>

                            <!-- Delete Button -->
                            {{-- <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
