<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReservationEmail;



class OffersController extends Controller
{

    public function index()
    {
       $context=['offers'=>Offer::orderBy('offer_arrival_date')->get()];
       return view('index', $context);
    }

    public function detail(Offer $offer){

        return view('detail',['offer'=>$offer]);
    }

    public function showReserveForm(Offer $offer){
        return view('make_reserve',['offer'=>$offer]);
    }

    public function makeReserve(Request $request, Offer $offer)
    {
//        $a=new NewReservationEmail();
//        Mail::to('borodachev@gmail.com')->send($a);
//        exit;

        $rooms_to_reserve=$request->input('rooms');
        $left_rooms=($offer->offer_rooms_quantity-$rooms_to_reserve);
        $offer->fill(['offer_rooms_quantity'=>$left_rooms]);
        $offer->save();
        Mail::to($request->input('email')->send(new NewReservationEmail()));
        return view ('reserv_done');

    }

}
