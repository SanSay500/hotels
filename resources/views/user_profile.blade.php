@extends('layouts.base')

@section('title', 'My Profile')

@section('main')

    <h2 class="my-3 text-center">Profile</h2>
    <p>Name: {{Auth::user()->name}}</p>
    <p>Email: {{Auth::user()->email}}</p>
    <p>Phone: {{Auth::user()->phone}}</p>
    <p>Country: {{Auth::user()->country}}</p>
    <p>Company: {{Auth::user()->company}}</p>
    <p>Description: {{Auth::user()->description}}</p>
    <p>Points: {{Auth::user()->points}}</p>
    <p>Role: {{Auth::user()->role}}</p>
{{--    <p><a href="{{ route('user.profile.edit', ['user'=>Auth::user()->id]) }}">--}}
{{--            <input type="submit" class="btn btn-primary" value="Edit"></a></p>--}}


    <p><a href="/home"><input type="submit" class="btn btn-primary" value="Back"></a></p>

@endsection
