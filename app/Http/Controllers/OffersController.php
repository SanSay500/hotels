<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;


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
}
