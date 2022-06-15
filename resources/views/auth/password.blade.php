@extends('layouts.base')

@section('title', 'Login')

@section('main')
<section class="login-form">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 colum-md">
            <div class="card">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Enter password for your account') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('custom.login') }}">
                        @csrf

                            <div class="row mb-3 align-items-center">
                                <label for="password" class="col-md-4 text-md-end card-label">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        <input hidden name="email" value="{{$email}}"/>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary btn-login">
                                    {{ __('Enter') }}
                                </button>
                            </div>
                            <a class="text-center fs-6" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
