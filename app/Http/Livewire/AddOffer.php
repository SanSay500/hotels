<?php

namespace App\Http\Livewire;

use App\Models\Meal;
use App\Models\Room;
use Livewire\Component;
use App\Models\City;
use App\Models\Hotel;
use WireUi\Traits\Actions;

class AddOffer extends Component
{

use Actions;

    public $cities;
    public $hotels = [];
    public $city;
    public $hotel;
    public $dialog;

    public function save(): void
    {
        $this->dialog([
            'title'       => 'New Hotel Addition',
//            'description' => 'Save the information?',
            'icon'        => 'home',
            'accept'      => [
                'label'  => 'Save',
                'method' => 'save',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'Cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function render()
    {
        echo $this->city;
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
