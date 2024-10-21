<?php

// SliderFilter.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rooms;

class SliderFilter extends Component
{
    public $price = 200; // Default value for price
    public $bedrooms = 1; // Default value for bedrooms
    public $bathrooms = 1; // Default value for bathrooms
    public $filterApplied = false; // Flag to track if filter is applied

    public $enablePrice = false;
    public $enableBedrooms = false;
    public $enableBathrooms = false;
    
    public $searchTerm = '';

    public function render()
    {
        // Apply filtering based on checkbox states and search term
        $rooms = Rooms::when($this->enablePrice, function ($query) {
                    return $query->where('price', '<=', $this->price);
                })
                ->when($this->enableBedrooms, function ($query) {
                    return $query->where('bedRooms', '=', $this->bedrooms);
                })
                ->when($this->enableBathrooms, function ($query) {
                    return $query->where('bathRooms', '=', $this->bathrooms);
                })
                ->when($this->searchTerm, function ($query) {
                    return $query->where('floor', 'like', '%' . $this->searchTerm . '%');
                })
                ->get();

        return view('livewire.slider-filter', compact('rooms'));
    }

    public function applyFilter()
    {
        $this->filterApplied = true;
    }

    public function clearFilter()
    {
        $this->reset(['price', 'bedrooms', 'bathrooms', 'searchTerm']);
        $this->filterApplied = false;
    }
}
