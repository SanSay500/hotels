@extends('layouts.base')

@section('title', $offer->offer_hotel.' Hotel Offers')

@section('main')
<section class="hotel-detail">
    <div class="container">
    <h2>Hotel name: {{$offer->offer_hotel}}</h2>
    <p><span class="info-label">Description:</span> {{$offer->offer_content}}</p>
    <p><span class="info-label">City:</span> {{$offer->offer_city}}</p>
    <p><span class="info-label">Arrival date:</span> {{$offer->offer_arrival_date}}</p>
    <p><span class="info-label">Nights:</span> {{$offer->offer_nights}}</p>
    <p><span class="info-label">Rooms quantity:</span> {{$offer->offer_rooms_quantity}}</p>
    <p><span class="info-label">Price:</span> {{$offer->offer_price}}</p>
    <p><span class="info-label">Published by:</span> {{$offer->user->name}}</p>
@auth()
    <p><span class="info-label">Phone:</span> {{$offer->user->phone}}</p>
    <p><span class="info-label">E-mail:</span> {{$offer->user->email}}</p>
@endauth
    <div class="btn-container"><a href="/" class="more-btn back-btn">Back</a>
@auth
        <a class="more-btn" href="{{route('reserveOffer.form', $offer->id)}}">Make Reserve</a></div>
@endauth
    </div>
</section>
    
@endsection('main')

