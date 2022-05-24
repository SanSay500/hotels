<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Room;
use App\Notifications\GotNewOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\User;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    private const OFFER_VALIDATOR = [
      'content' => '',
      'hotel' => 'required',
      'nights' => 'required|numeric',
      'arrivalDate' => 'required',
      'meals' => 'required',
      'rooms' => 'required',
      'room_class' => 'required',
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
        $this->middleware(['auth', 'verified']);
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
        $rooms = Room::all();
        $meals = Meal::all();
        $cities = City::all();
        $hotels = Hotel::all();
        return view('offer_add',['rooms'=>$rooms, 'meals'=>$meals, 'cities'=>$cities, 'hotels'=>$hotels]);
    }

    public function storeOffer(Request $request) {

        $validated = $request->validate(self::OFFER_VALIDATOR, self::OFFER_ERROR_MESSAGES);
        $users = User::where('notif_ids', 1)->get();
        $hotel = Hotel::where('id',$request['hotel'])->first()->name;
        Auth::user()->offers()->create(
               ['offer_content' =>'',
                'offer_hotel'=>$hotel,
                'offer_nights'=>$validated['nights'],
                'offer_rooms_quantity'=>$validated['rooms'],
                'offer_room_class'=>$validated['room_class'],
                'offer_meals'=>$validated['meals'],
                'offer_arrival_date'=>$validated['arrivalDate'],
                'offer_status'=>'Inactive',
                'offer_city'=>$request->city,
                'private_policy'=> isset($request['private_policy']) ? 1 : 0,
                'offer_price'=>$validated['price']
        ]);
        $offer = Offer::get()->last()->id;
        Notification::send($users, new GotNewOffer($request->city, $hotel, $offer));

        //$notifJob = (new NotificationsJOb)->delay(now()->addSeconds(5));
        //dispatch($notifJob);
        return redirect()->route('home');
    }
    public function showEditOfferForm(Offer $offer){
        $rooms = Room::all();
        $meals = Meal::all();
        return view ('offer_edit', ['offer'=>$offer, 'rooms'=>$rooms, 'meals'=>$meals]);
    }

    public function updateOffer(Request $request, Offer $offer){
        $validated = $request->validate(self::OFFER_VALIDATOR,
                                     self::OFFER_ERROR_MESSAGES);

        $offer->fill(
                    ['offer_content'=>$validated['content'],
                     'offer_hotel'=>$validated['hotel'],
                     'offer_nights'=>$validated['nights'],
                     'offer_rooms_quantity'=>$validated['rooms'],
                     'offer_room_class'=>$validated['room_class'],
                     'offer_meals'=>$validated['meals'],
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
