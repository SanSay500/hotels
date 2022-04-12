@extends('layouts.base')

@section('title', 'Edit offer :: My Offers')

@section('main')
    <form action="{{ route('offer.update', ['offer'=>$offer->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="txtTitle">Offer</label>
            <input name="title" id="txtTitle" class="form-control
                   @error ('title') is-invalid @enderror" value="{{ old('title',$offer->offer_title) }}">
        @error ('title')
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
            <label for="txtContent">City</label>
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
                <stron> {{ $message }}</stron>
            </span>
        @enderror
        </div>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>
@endsection
