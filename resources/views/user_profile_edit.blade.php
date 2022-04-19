@extends('layouts.base')

@section('title', 'My Profile Edit')

@section('main')
<section class="user-profile__edit">
    <div class="container">
    <h2 class="my-3 text-center">Edit Profile</h2>
    <form action="{{ route('profile.update',Auth::user()->id) }}" method="POST">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <label for="txtname">Name</label>
            <input name="name" id="txtname" class="form-control
                   @error ('name') is-invalid @enderror" value="{{ old('name',Auth::user()->name) }}">
            @error ('name')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtcompany">Company</label>
            <input name="company" id="txtcompany" class="form-control
                   @error ('company') is-invalid @enderror" value="{{ old('company',Auth::user()->company) }}">
            @error ('company')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtcountry">Country</label>
            <input name="country" id="txtcountry" class="form-control
                   @error ('country') is-invalid @enderror" value="{{ old('country',Auth::user()->country) }}">
            @error ('country')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtdescription">Description</label>
            <input name="description" id="txtdescription" class="form-control
                   @error ('description') is-invalid @enderror" value="{{ old('description',Auth::user()->description) }}">
            @error ('description')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="txtphone">Phone</label>
            <input name="phone" id="txtphone" class="form-control
                   @error ('phone') is-invalid @enderror" value="{{ old('phone',Auth::user()->phone) }}">
            @error ('phone')
            <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
            @enderror
        </div>
        <br>
        <div class="btn-container"><a href="/home" class="more-btn back-btn">Back</a>
        <input type="submit" class="btn btn-primary" value="Save"></div>
    </form>
    </div>
</section>
    

@endsection
