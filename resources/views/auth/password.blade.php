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
