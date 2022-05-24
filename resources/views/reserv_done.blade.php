@extends('layouts.base')

@section('title','Hotel Offers')

@section('main')
    <h2 class="my-3 text-center">Your reserve sent to Publisher. You will be contacted soon.</h2>
    <h2 class="my-3 text-center">Reserve information</h2>
    <h3 class="my-3 text-center">Reserve City: {{$offer->offer_city}}</h3>
    <h3 class="my-3 text-center">Reserve Hotel: {{$offer->offer_hotel}}</h3>
    <h3 class="my-3 text-center">Arrival Date: {{$offer->offer_arrival_date}}</h3>
        @if ($offer->private_policy)
            <h3 class="my-3 text-center">Publisher name: {{$user->name}}</h3>
            <h3 class="my-3 text-center">Publisher phone: {{$user->phone}}</h3>
            <h3 class="my-3 text-center">Publisher e-mail: {{$user->email}}</h3>
    @endif
    <center><p><a href="/"><input type="submit" class="btn btn-primary" value="Home"></a></p></center>

@endsection
