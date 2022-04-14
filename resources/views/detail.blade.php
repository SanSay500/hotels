@extends('layouts.base')

@section('title', $offer->offer_hotel.' Hotel Offers')

@section('main')
    <h2>Hotel name: {{$offer->offer_hotel}}</h2>
    <p>Description: {{$offer->offer_content}}</p>
    <p>City: {{$offer->offer_city}}</p>
    <p>Arrival date: {{$offer->offer_arrival_date}}</p>
    <p>Nights: {{$offer->offer_nights}}</p>
    <p>Rooms quantity: {{$offer->offer_rooms_quantity}}</p>
    <p>Price: {{$offer->offer_price}}</p>
    <p>Published by: {{$offer->user->name}}</p>
@auth()
    <p>Phone: {{$offer->user->phone}}</p>
    <p>E-mail: {{$offer->user->email}}</p>
@endauth
    <p><a href="/"><input type="submit" class="btn btn-primary" value="Back"></a>
@auth
        <a href="{{route('reserveOffer.form', $offer->id)}}"><input type="submit" class="btn btn-primary" value="Make Reserve"></a></p>
@endauth
@endsection('main')

