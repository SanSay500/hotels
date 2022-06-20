<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Offer;


class OrderHistory extends Component
{
    public $new_status;
    public $order;

    public function changeStatus($order, $new_status)
    {
        $status = preg_replace("/[0-9]/",'', $new_status);
      Order::where('id',$order['id'])->update(['status'=>$status]);
      if ($status=='Cancelled') {
          Offer::find($order['offer_id'])->increment('offer_rooms_quantity', $order['rooms_quantity']);
      }
    }

    public function render()
    {
        $user_id=Auth::user()->id;
        $ordersBought = Order::query()->where('buyer_id',$user_id)->get();
        $ordersSold = Order::query()->where('seller_id',$user_id)->get();
        $orderStatuses = OrderStatus::get();
        return view('livewire.order-history',['ordersSold'=>$ordersSold, 'ordersBought'=>$ordersBought, 'orderStatus'=>$orderStatuses]);

    }
}
