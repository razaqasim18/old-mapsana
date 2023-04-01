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
                    <p class="signintext">Enter Email to reset your password</p>
                    <div class="signinformcontainer">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Send Email</button>
                        </form>
                    </div>
                    <div class="mt-3">
                        <p class="signintext">
                            Already have an account?
                            <a href="{{ route('login') }}">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
