@extends('layouts.base')

@section('title', 'Add offer :: My Offers')

@section('main')
    <form action="{{ route('offer.store') }}" method="POST">
        @csrf
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
                      class="form-control @error ('content') is-invalid @enderror" row="3">{{ old('content') }}</textarea>
            @error ('content')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
                <stron> {{ $message }}</stron>
            </span>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary" value="Add ">
    </form>
@endsection
