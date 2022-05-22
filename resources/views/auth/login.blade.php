@extends('layouts.base')

@section('title', 'Login')

@section('main')
<section class="login-form">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 colum-md">
            <div class="card">

                <div class="card-header">{{ __('Sign up or create an account') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('check_email') }}">
                        @csrf

                        <div class="row mb-3 align-items-center">
                            <label for="email" class="col-md-4 text-md-end card-label">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input hidden type="password">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary btn-login">
                                    {{ __('Continue via e-mail') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
