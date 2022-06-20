<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Hotel;

class AddHotelForm extends ModalComponent
{
    protected $listener =['openModal' => 'render'];
//    public Hotel $hotel;
//    public function mount(Hotel $hotel){
//        $this->hotel=$hotel;
//    }
//    public function save(){
//        $data = [
//            'name'=>$this->hotel,
//            'city_id'=>$this->city->id,
//        ];
//        Hotel::create($data);
//    }
//    public function render()
//    {
//        return view('livewire.add-hotel-form');
//    }
}
