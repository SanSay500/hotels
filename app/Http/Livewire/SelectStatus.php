<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectStatus extends Component
{
  public $orderStatus;
  public $new_status;
  public $order;

    public function render()
    {
        return <<<'blade'
            <div>

               {{$new_status}}
               <button wire:click="$emit('updateStatus', {{$new_status}})">Update</button>

            </div>
        blade;
    }
}
