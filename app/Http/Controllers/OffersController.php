<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReservationClient;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewReservationAgent;

class OffersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
       $offers = Offer::paginate(3);
       return view('index', ['offers'=>$offers]);
    }

    public function detail(Offer $offer){

        return view('detail',['offer'=>$offer]);
    }

    public function showReserveForm(Offer $offer){
        return view('make_reserve',['offer'=>$offer]);
    }

    public function makeReserve(Request $request, Offer $offer)
    {
        $rooms=$request->input('rooms');
        $left_rooms=($offer->offer_rooms_quantity-$rooms);
        $offer->fill(['offer_rooms_quantity'=>$left_rooms]);
        $offer->save();
        Order::create([
            'hotel' => $offer->offer_hotel,
            'offer_id'=>$offer->id,
            'city' => $offer->offer_city,
            'arrival_date' => $offer->offer_arrival_date,
            'rooms_quantity' => $rooms,
            'nights' => $offer->offer_nights,
            'price' => $offer->offer_price,
            'seller_id'=>$offer->user_id,
            'buyer_id'=>Auth::user()->id
        ]);
        Mail::to($offer->user->email)->send(new NewReservationAgent($offer, $rooms));
        Mail::to(Auth::user()->email)->send(new NewReservationClient($offer, $rooms));
        return view ('reserv_done');


    }

}
