@extends('layouts.base')

@section('title','Hotel Offers')

@section('main')
<section class="reserve">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    <form action="{{ route('offer.reserve', ['offer'=>$offer->id]) }}" method="POST">
        @csrf
        @method('PATCH')
    <h2>Hotel name: {{$offer->offer_hotel}}</h2>
    <p><span class="info-label">City:</span> {{$offer->offer_city}}</p>
    <p><span class="info-label">Arrival date:</span> {{$offer->offer_arrival_date}}</p>
    <p><span class="info-label">Nights:</span> {{$offer->offer_nights}}</p>
    <p><span class="info-label">Price:</span> {{$offer->offer_price}}</p>
    <p><span class="info-label">Published by:</span> {{$offer->user->name}}</p>
    <p><span class="info-label">Rooms available:</span> {{$offer->offer_rooms_quantity}}</p>
    <label for="txtRooms" class="info-label">Rooms to reserve:
    <input size="2" name="rooms" id="txtRooms"
           class="" value="{{ old('rooms', $offer->offer_rooms_quantity) }}">
    </label>
    <input type="submit" class="btn btn-primary" value="Make reservation">
    </form>
    </div>

</section>


@endsection
