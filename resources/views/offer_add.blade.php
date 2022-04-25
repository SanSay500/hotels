@extends('layouts.base')

@section('title', 'Add offer :: My Offers')

@section('main')
<section class="offer__add">
    <div class="container">
    <form action="{{ route('offer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtArrivalDate">Arrival Date</label>
            <input name="arrivalDate" type="date" min="<?php echo date("Y-m-d"); ?>" id="txtArrivalDate" class="form-control
                   @error ('arrivalDate') is-invalid @enderror" value="{{ old('arrivalDate') }}">
            @error ('arrivalDate')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtHotel">Hotel</label>
            <input name="hotel" id="txtHotel" class="form-control
                   @error ('hotel') is-invalid @enderror" value="{{ old('hotel') }}">
            @error ('hotel')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtContent">Description</label>
            <textarea name="content" id="txtContent"
                      class="form-control @error ('content') is-invalid @enderror" row="3" value="{{ old('content') }}"></textarea>
            @error ('content')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtNights">Nights</label>
            <input name="nights" id="txtNights"
                      class="form-control @error ('nights') is-invalid @enderror" row="3" value="{{ old('nights') }}">
            @error ('nights')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtRooms">Rooms Quantity</label>
            <input name="rooms" id="txtRooms"
                   class="form-control @error ('rooms') is-invalid @enderror" row="3" value="{{ old('rooms') }}">
            @error ('rooms')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtRooms">Rooms class</label>
            <select name="room_class" class="form-control">
                @foreach ($rooms as $room)
                    <option>{{ $room->room_class }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="txtRooms">Meals</label>
            <select name="meals" class="form-control">
                @foreach ($meals as $meal)
                <option>{{ $meal->meals }} </option>
                @endforeach
            </select>
            </span>
        </div>


        <div class="form-group">
            <label for="txtContent">City</label>
            <input name="city" id="txtCity"
                   class="form-control @error ('city') is-invalid @enderror" value="{{ old('city') }}">
            @error ('city')
            <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
        </div>
        @enderror

        <div class="form-group">
            <label for="txtPrice">Price</label>
            <input name="price" id="txtPrice"
                   class="form-control @error ('price') is-invalid @enderror" value="{{ old('price') }}">
            @error ('price')
            <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <div class="btn-container"><a class="more-btn back-btn" href="/home">Back</a>
        <input type="submit" class="more-btn back-btn" value="Add "> </div>
    </form>
    <br>

    </div>
</section>


@endsection
