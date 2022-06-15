@extends('layouts.base')

@section('title', $offer->offer_hotel.' Hotel Offers')

@section('main')
<section class="hotel-detail">
    <div class="container">
    <h2>Hotel: {{$offer->offer_hotel}}</h2>
    <p><span class="info-label">Offer ID: </span> {{$offer->id}}</p>
    <p><span class="info-label">Description: </span> {{$offer->offer_content}}</p>
    <p><span class="info-label">City:</span> {{$offer->offer_city}}</p>
    <p><span class="info-label">Date:</span> {{\Carbon\Carbon::parse($offer->offer_arrival_date)->format('j M Y')}}</p>
    <p><span class="info-label">Nights:</span> {{$offer->offer_nights}}</p>
    <p><span class="info-label">Rooms:</span> {{$offer->offer_rooms_quantity}}</p>
    <p><span class="info-label">Rooms class:</span> {{$offer->offer_room_class}}</p>
    <p><span class="info-label">Meals:</span> {{$offer->offer_meals}}</p>
    <p><span class="info-label">Price:</span> {{$offer->offer_price}} NIS</p>
    <div class="btn-container"><a href="/" class="more-btn back-btn">Back</a>
@auth
        <a class="more-btn" href="{{route('reserveOffer.form', $offer->id)}}">Make reservation</a></div>
@endauth
    </div>
</section>

@endsection('main')

