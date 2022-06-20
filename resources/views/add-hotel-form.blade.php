@extends('layouts.base')

@section('title', 'Add Hotel')

@section('main')

    <div class="container">
        <form method="POST" action="{{ route('hotel.add.store') }}">
            @csrf
    <div class="form-group">
        <label>Add new Hotel in City - {{$city->name}}</label>
        <input name="hotel_name" class="form-control"  rows="3">
        <input name="city" hidden value="{{$city->id}}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
@endsection
