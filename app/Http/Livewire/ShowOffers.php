<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Offer;

class ShowOffers extends Component
{
    public function render()
    {
        return view('livewire.show-offers',['offers'=>Offer::all()]);
    }
}
