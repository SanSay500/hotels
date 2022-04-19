@extends('layouts.base')

@section('title', 'Delete Offer')
@section('main')
<section class="offer__delete">
    <div class="container"> 
    <h2>{{$offer->offer_hotel}}</h2>
    <p>{{$offer->offer_content}}</p>
    <p>{{$offer->offer_city}}</p>
    <p>{{$offer->offer_price}}</p>
    <p>Published by: {{$offer->user->name}}</p>
    <form action="{{ route('offer.destroy', ['offer'=>$offer->id]) }}" method="POST">
    @csrf
    @method ('DELETE')
    <div class="btn-container"><a href="/home" class="more-btn back-btn">Back</a>
    <input type="submit" class="btn btn-danger" value="Delete"> </div>
    </form>
    </div>
</section>
    
@endsection

