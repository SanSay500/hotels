<?php

namespace App\Http\Livewire;

use App\Models\Meal;
use App\Models\Room;
use Livewire\Component;
use App\Models\City;
use App\Models\Hotel;

class AddOffer extends Component
{
    public $cities;
    public $hotels = [];
    public $city;
    public $hotel;

    public function mount()
    {
        $this->refreshData();
    }

    private function refreshData()
    {
        $this->rooms = Room::all();
        $this->meals = Meal::all();
        $this->cities = City::orderBy('name')->get();
        if (!empty($this->city)) {
            $this->hotels = Hotel::where('city_id', $this->city)->get();
        }
    }

    public function render()
    {
        $this->refreshData();
        return view('livewire.add-offer');
    }


}
