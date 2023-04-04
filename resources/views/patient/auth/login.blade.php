@extends('layouts.app')
@section('style')
@endsection
@section('content')
<!--Signin Form Start -->
<div class="container-fluid py-5 wow fadeInUp">
    <div class="p-5 signinWrapper">
        <div class="">
            <div class="signinimg">
                <img src="{{ asset('front_assets/doctor-imgs/signin_side_img.gif') }}" alt="" />
            </div>
        </div>
        <div class="">
            <div class="mb-4">
                <h2>Get Started Now</h2>
                <p class="signintext">Login or sign up to get more benefits</p>
            </div>
            <div class="signinformcontainer">
                @if (session('error'))
                <div class="{{ session('alert') ? session('alert') : 'alert alert-danger' }}" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label> <br />
                        <input type="email" name="email" id="email" class="" placeholder="johnsmith@gmail.com" value="{{ old('email') }}" required />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="passwordsignin">Password</label> <br />
                        <input type="password" name="password" id="passwordsignin" class="" placeholder="XXXXXXXX" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="" class="" id="remcheck" />
                        <label class="form-label" for="remcheck">Remember me</label>
                        <a class="ml-3" href="{{ route('password.request') }}">Forgot password</a>
                    </div>
                    <button class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="mt-3">
                <p class="signintext">
                    Don't have an account?
                    <a href="{{ route('register') }}">Register now</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--Signin Form End -->
@endsection