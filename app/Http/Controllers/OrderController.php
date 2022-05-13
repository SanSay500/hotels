<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

    public function history()
    {
        $user_id=Auth::user()->id;
        $ordersBought = Order::query()->where('buyer_id',$user_id)->get();
        $ordersSold = Order::query()->where('seller_id',$user_id)->get();
        return view('order_history',['ordersSold'=>$ordersSold, 'ordersBought'=>$ordersBought]);
    }
}
