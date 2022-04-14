@extends('layouts.base')

@section('title', 'My Offers')

@section('main')
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <h2 class="my-3 text-center">My Offers</h2>
    <p class="text-right"><a href="{{route('offer.add')}}">Add Offer</a></p>
    <p class="text-right"><a href="{{route('user.profile')}}">My Profile</a></p>
    @if (count($offers)>0)
       <table class="table table-stripped">
           <thead>
              <tr>
                  <th>Hotel</th>
                  <th>City</th>
                  <th>Arrival Date</th>
                  <th>Nights</th>
                  <th>Rooms quantity</th>
                  <th>Price</th>
                  <th colspan="2">&nbsp;</th>
              </tr>
           </thead>
           <tbody>
           @foreach($offers as $offer)
               <tr>
                   <td><h3>{{$offer->offer_hotel}}</h3></td>
                   <td><h3>{{$offer->offer_city}}</h3></td>
                   <td><h3>{{$offer->offer_arrival_date}}</h3></td>
                   <td><h3>{{$offer->offer_nights}}</h3></td>
                   <td><h3>{{$offer->offer_rooms_quantity}}</h3></td>
                   <td><h3>{{$offer->offer_price}}</h3></td>
                   <td><a href="{{route('offer.editForm', ['offer'=>$offer->id])}}">Change</a></td>
                   <td><a href="{{route('offer.deleteForm', ['offer'=>$offer->id])}}">Delete</a></td>
               </tr>
           @endforeach
           </tbody>
       </table>
    @endif
@endsection
