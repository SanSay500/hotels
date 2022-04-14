@extends('layouts.base')

@section('title','Hotel Offers')

@section('main')
    <form action="{{ route('offer.reserve', ['offer'=>$offer->id]) }}" method="POST">
        @csrf
        @method('PATCH')
    <h2>Hotel name: {{$offer->offer_hotel}}</h2>
    <p>City: {{$offer->offer_city}}</p>
    <p>Arrival date: {{$offer->offer_arrival_date}}</p>
    <p>Nights: {{$offer->offer_nights}}</p>
    <p>Price: {{$offer->offer_price}}</p>
    <p>Published by: {{$offer->user->name}}</p>
    <p>Phone: {{$offer->user->phone}}</p>
    <p>E-mail: {{$offer->user->email}}</p>
    <p>Rooms available: {{$offer->offer_rooms_quantity}}</p>
    <label for="txtRooms">Rooms to reserve:
    <input size="2" name="rooms" id="txtRooms"
           class="" value="{{ old('rooms', $offer->offer_rooms_quantity) }}">
    </label>
    <input type="submit" class="btn btn-primary" value="Reserve">
    </form>

@endsection
