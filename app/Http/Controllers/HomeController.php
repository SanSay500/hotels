<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\User;

class HomeController extends Controller
{
    private const OFFER_VALIDATOR = [
      'content' => 'required',
      'hotel' => 'required',
      'nights' => 'required|numeric',
      'arrivalDate' => 'required',
      'rooms' => 'required|numeric',
      'city' => 'required',
      'price'=>'required|numeric|min:1'
    ];
    private const OFFER_ERROR_MESSAGES = [
        'price.required' => 'Price must be not zero' ,
        'required' => 'Fill this field',
        'max' =>'Value must be shorter than :max symbols',
        'min' =>'Value must be more than zero',
        'numeric' => 'Enter a number'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['offers'=>Auth::user()->offers()->latest()->get()]);
    }

    public function showAddOfferForm() {
        return view('offer_add');
    }

    public function storeOffer(Request $request) {
        $validated = $request->validate(self::OFFER_VALIDATOR, self::OFFER_ERROR_MESSAGES);
        Auth::user()->offers()->create(
               ['offer_content'=>$validated['content'],
                'offer_hotel'=>$validated['hotel'],
                'offer_nights'=>$validated['nights'],
                'offer_rooms_quantity'=>$validated['rooms'],
                'offer_arrival_date'=>$validated['arrivalDate'],
                'offer_city'=>$validated['city'],
                'offer_price'=>$validated['price']
        ]);
        return redirect()->route('home');
    }
    public function showEditOfferForm(Offer $offer){
        return view ('offer_edit', ['offer'=>$offer]);
    }

    public function updateOffer(Request $request, Offer $offer){
        $validated = $request->validate(self::OFFER_VALIDATOR,
                                     self::OFFER_ERROR_MESSAGES);
        $offer->fill(
                    ['offer_content'=>$validated['content'],
                     'offer_hotel'=>$validated['hotel'],
                     'offer_nights'=>$validated['nights'],
                     'offer_rooms_quantity'=>$validated['rooms'],
                     'offer_arrival_date'=>$validated['arrivalDate'],
                     'offer_city'=>$validated['city'],
                     'offer_price'=>$validated['price']
        ]);
        $offer->save();
        return redirect()->route('home');
    }

    public function showDeleteOfferForm(Offer $offer){
        return view('offer_delete', ['offer'=>$offer]);
    }

    public function deleteOffer(Offer $offer){
        $offer->delete();
        return redirect()->route('home');
    }
}
