@extends('layouts.base')

@section('title', 'My Profile')

@section('main')
    <section class="user-profile">
        <div class="container">
        <h2 class="my-3 text-center">Profile</h2>
    <p><span class="info-label">Name:</span> {{Auth::user()->name}}</p>
    <p><span class="info-label">Email:</span> {{Auth::user()->email}}</p>
    <p><span class="info-label">Phone:</span> {{Auth::user()->phone}}</p>
    <p><span class="info-label">Country:</span> {{Auth::user()->country}}</p>
    <p><span class="info-label">Company:</span> {{Auth::user()->company}}</p>
    <p><span class="info-label">Description:</span> {{Auth::user()->description}}</p>
    <p><span class="info-label">Points:</span> {{Auth::user()->points}}</p>
    <p><span class="info-label">Role:</span> {{Auth::user()->role}}</p>
    <p><span class="info-label">Notifications:</span> {{Auth::user()->notif_ids ? 'On' : 'Off'}} </p>
    <div class="btn-container"><a href="/home" class="more-btn back-btn">Back</a><a class="more-btn" href="{{ route('user.profile.edit', ['user'=>Auth::user()->id]) }}">Edit</a>
            </div>
        </div>
    </section>


@endsection
