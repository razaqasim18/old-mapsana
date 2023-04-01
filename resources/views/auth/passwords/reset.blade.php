@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 wow fadeInUp">
        <div class="p-5 signinWrapper">
            <div class="">
                <div class="signinimg">
                    <img src="{{ asset('front_assets/doctor-imgs/signin_side_img.gif') }}" alt="" />
                </div>
            </div>
            <div class="">
                <div class="mb-4">
                    <h2>Doctor Reset Password</h2>
                    <p class="signintext">Enter Password to reset your accuont</p>
                    <div class="signinformcontainer">

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button class="btn btn-primary"> {{ __('Reset Password') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
