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

    public function render()
    {
        $this->rooms = Room::all();
        $this->meals = Meal::all();
        $this->cities = City::orderBy('name')->get();

        if (!empty($this->city)) {
            $city_id = City::where('name', $this->city)->get('id')->first();
        }
        if (!empty($city_id)) {
            $this->hotels = Hotel::where('city_id', $city_id->id)->get();
        }
        return view('livewire.add-offer');
    }


}
