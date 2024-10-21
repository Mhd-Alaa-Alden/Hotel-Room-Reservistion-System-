@extends('adminkit.layouts.app')
@section('content')


    <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

        </div>
        <div class="mb-3">
            <label class="form-label" for="bedRooms">Bedrooms</label>
            <input type="text" name="bedRooms" id="bedRooms" class="form-control" value="{{ old('bedRooms') }}">
            <div class="text-danger">
                @error('bedRooms')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="bathRooms">Bathrooms</label>
            <input type="text" name="bathRooms" id="bathRooms" class="form-control" value="{{ old('bathRooms') }}">
            <div class="text-danger">
                @error('bathRooms')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="area">Area</label>
            <input type="text" name="area" id="area" class="form-control" value="{{ old('area') }}">
            <div class="text-danger">
                @error('area')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="floor">Floor</label>
            <input type="text" name="floor" id="floor" class="form-control" value="{{ old('floor') }}">
            <div class="text-danger">
                @error('floor')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
            <div class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" type="file" for="filename">Room_Pic</label>
            <input type="file" name="filename" id="filename" class="form-control" value="{{ old('filename') }}">
            <div class="text-danger">
                @error('Floor')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <button class="btn btn-secondary">Add Room</button>
    </form>
@endsection
