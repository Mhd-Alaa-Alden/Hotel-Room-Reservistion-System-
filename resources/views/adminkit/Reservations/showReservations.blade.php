@extends('adminkit.layouts.app')
@section('content')
@section('title')
    Reservation Managment
@endsection
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@foreach ($reservations as $reservation)
<div class="container pt-3">
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../storage/uploadimg/{{ $reservation->room->filename }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Reservation ID: {{ $reservation->id }}</h5>
                    <p class="card-text">
                        RoomName: {{ $reservation->room->name }}<br>
                        Name: {{ $reservation->name }}<br>
                        Email: {{ $reservation->email }}<br>
                        Phone: {{ $reservation->phone }}<br>
                        Payment: {{ $reservation->payment }}<br>
                        Notes: {{ $reservation->note }}
                    </p>
                    <!-- Display confirmation buttons -->
                    <form action="{{ route('book.update', $reservation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success" name="status" value="1">Confirm</button>
                    </form>

                    <form action="{{ route('book.update', $reservation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger" name="status" value="2">Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
