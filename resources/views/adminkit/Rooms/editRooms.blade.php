@extends('adminkit.layouts.app')
@section('content')
    <form action="{{ route('rooms.update', [$room->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Room Name -->
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $room->name) }}">
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Bed Rooms -->
        <div class="mb-3">
            <label class="form-label" for="bedRooms">Bed Rooms</label>
            <input type="text" name="bedRooms" id="bedRooms" class="form-control"
                value="{{ old('bedRooms', $room->bedRooms) }}">
            <div class="text-danger">
                @error('bedRooms')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Bath Rooms -->
        <div class="mb-3">
            <label class="form-label" for="bathRooms">Bath Rooms</label>
            <input type="text" name="bathRooms" id="bathRooms" class="form-control"
                value="{{ old('bathRooms', $room->bathRooms) }}">
            <div class="text-danger">
                @error('bathRooms')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Area -->
        <div class="mb-3">
            <label class="form-label" for="area">Area</label>
            <input type="text" name="area" id="area" class="form-control" value="{{ old('area', $room->area) }}">
            <div class="text-danger">
                @error('area')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Floor -->
        <div class="mb-3">
            <label class="form-label" for="floor">Floor</label>
            <input type="text" name="floor" id="floor" class="form-control"
                value="{{ old('floor', $room->floor) }}">
            <div class="text-danger">
                @error('floor')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control"
                value="{{ old('price', $room->price) }}">
            <div class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Current Image -->
        @if ($room->filename)
            <div class="mb-3">
                <label class="form-label">Current Image</label> <br>
                <img src="{{ asset('storage/uploadimg/' . $room->filename) }}" alt="{{ $room->name }}"
                    style="max-width: 20%; height: auto;">
            </div>
        @endif

        <!-- New Image -->
        <div class="mb-3">
            <label class="form-label" for="filename">New Image (optional)</label>
            <input type="file" name="filename" id="filename" class="form-control">
            <div class="text-danger">
                @error('filename')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="avaiablity">Avaiablity</label>
            <select name="avaiablity" id="avaiablity" class="form-control">
                <option value="Avaiable" {{ $room->availability == 'Avaiable' ? 'selected' : '' }}>Avaiable</option>
                <option value="UnAvaiable" {{ $room->availability == 'UnAvaiable' ? 'selected' : '' }}>UnAvaiable
                </option>
            </select>
            <div class="text-danger">
                @error('avaiablity')
                    {{ $message }}
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
@endsection
