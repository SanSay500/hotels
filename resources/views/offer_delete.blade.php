@extends('layouts.base')

@section('title', 'Delete Offer')
@section('main')

    <h2>{{$offer->offer_hotel}}</h2>
    <p>{{$offer->offer_content}}</p>
    <p>{{$offer->offer_city}}</p>
    <p>{{$offer->offer_price}}</p>
    <p>Published by: {{$offer->user->name}}</p>
    <form action="{{ route('offer.destroy', ['offer'=>$offer->id]) }}" method="POST">
    @csrf
    @method ('DELETE')
    <input type="submit" class="bnt btn-danger" value="Delete">
    </form>
    <br>
    <p><a href="/home">Back</a></p>
@endsection

