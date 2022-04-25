@extends('layouts.base')

@section('title', 'Edit offer :: My Offers')

@section('main')
<section class="offer__edit">
    <div class="container">
    <form action="{{ route('offer.update', ['offer'=>$offer->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="txtArrivalDate">Arrival Date</label>
            <input name="arrivalDate" type="date" id="txtArrivalDate" class="form-control
                   @error ('arrivalDate') is-invalid @enderror" value="{{ old('arrivalDate', $offer->offer_arrival_date) }}">
            @error ('arrivalDate')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtHotel">Hotel</label>
            <input name="hotel" id="txtHotel" class="form-control
                   @error ('hotel') is-invalid @enderror" value="{{ old('hotel',$offer->offer_hotel) }}">
        @error ('hotel')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="txtContent">Description</label>
            <textarea name="content" id="txtContent"
                      class="form-control @error ('content') is-invalid @enderror" row="3">{{ old('content',$offer->offer_content) }}</textarea>
        @error ('content')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="txtNights">Nights</label>
            <input name="nights" id="txtNights"
                   class="form-control @error ('nights') is-invalid @enderror" row="3" value="{{ old('nights', $offer->offer_nights) }}">
            @error ('nights')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtRooms">Rooms Quantity</label>
            <input name="rooms" id="txtRooms"
                   class="form-control @error ('rooms') is-invalid @enderror" row="3" value="{{ old('rooms', $offer->offer_rooms_quantity) }}">
            @error ('rooms')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtRooms">Rooms class</label> now set: {{$offer->offer_room_class}}
            <select name="room_class" class="form-control">
                @foreach ($rooms as $room)
                      <option
                          @if ($room->room_class === $offer->offer_room_class)
                                  selected
                          @endif
                      >
                          {{ $room->room_class }}
                      </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="txtMeals">Meals class</label> now set: {{$offer->offer_meals}}
            <select name="meals" class="form-control">
                @foreach ($meals as $meal)
                    <option
                        @if ($meal->meals === $offer->offer_meals)
                            selected
                        @endif
                    >
                        {{ $meal->meals }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="txtCity">City</label>
            <input name="city" id="txtCity"
                   class="form-control @error ('city') is-invalid @enderror" value="{{ old('city', $offer->offer_city) }}">
        @error ('city')
            <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
        </div>
        @enderror

        <div class="form-group">
            <label for="txtPrice">Price</label>
            <input name="price" id="txtPrice"
                   class="form-control @error ('price') is-invalid @enderror" value="{{ old('price', $offer->offer_price) }}">
        @error ('price')
            <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
        @enderror
        </div>
        <br>
        <div class="btn-container">

        <input type="submit" class="more-btn back-btn" value="Save">
            <a href="{{url()->previous()}}"class="more-btn">Back</a>   </div>
    </form>
    </div>
</section>


@endsection
