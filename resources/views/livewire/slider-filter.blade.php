<!-- resources/views/livewire/slider-filter.blade.php -->

<div class="container d-flex justify-content-center d-inline-block ">
  
    <div class="row col-12 pt-3">
        <!-- Search Bar -->
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" wire:model.debounce.live.500ms="searchTerm" placeholder="Search by room floor...">
        </div>
        <div class="mb-3">
            <label for="priceSlider" class="form-label">Price</label>
            <input type="checkbox" wire:model.live="enablePrice" class="form-check-input">
            <input type="range" id="priceSlider" wire:model.live="price" class="form-range" min="0" max="1000" @unless($enablePrice) disabled @endunless>
            <span>Price: {{ $price }}</span>
        </div>
    
        <!-- Bedrooms Slider -->
        <div class="mb-3">
            <label for="bedroomsSlider" class="form-label">Bedrooms</label>
            <input type="checkbox" wire:model.live="enableBedrooms" class="form-check-input">
            <input type="range" id="bedroomsSlider" wire:model.live="bedrooms" class="form-range" min="1" max="5" @unless($enableBedrooms) disabled @endunless>
            <span>Bedrooms: {{ $bedrooms }}</span>
        </div>
    
        <!-- Bathrooms Slider -->
        <div class="mb-3">
            <label for="bathroomsSlider" class="form-label">Bathrooms</label>
            <input type="checkbox" wire:model.live="enableBathrooms" class="form-check-input">
            <input type="range" id="bathroomsSlider" wire:model.live="bathrooms" class="form-range" min="1" max="5" @unless($enableBathrooms) disabled @endunless>
            <span>Bathrooms: {{ $bathrooms }}</span>
        </div>
        @if ($rooms->isEmpty())
        <h1 class="text-center">No Rooms Avaiable.</h1>
        @else
    @foreach ($rooms as $room)
    <div class="col-md-4 ">
        <div class="card mb-4 shadow-sm card-img-top shadow-down" style="border-radius: 10px;">
            <img src="../storage/uploadimg/{{ $room->filename }}" alt="{{ $room->name }}"
                class="card-img-top shadow-down"
                style="object-fit: cover; height: 200px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title" style="color: #007bff;">{{ $room->name }}</h5>
                <!-- Add an image with a shadow effect -->
                <p class="card-text">
                    Bed Rooms: {{ $room->bedRooms }}<br>
                    Bath Rooms: {{ $room->bathRooms }}<br>
                    Area: {{ $room->area }} m<br>
                    Floor: {{ $room->floor }}<br>
                    Price: ${{ $room->price }}
                </p>

                <!-- Add any other details you want to display -->

                <!-- Example: Add a link to view more details -->

                @if ($room->avaiablity == 'Avaiable')
                <a href="{{ route('book.store', ['room_id' => $room->id, 'room_name' => $room->name]) }}"
                    class="btn btn-primary">Book Now</a>
            @else
                <u class="btn btn-danger">
                    Booked
                </u>
                <!-- Edit Button -->
            @endif
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
</div>

<!-- Display filtered rooms -->
