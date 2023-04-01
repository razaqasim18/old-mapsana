@extends('layouts.admin.auth')
@section('title')
    Forget Password
@endsection
@section('main')
    <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Forget Password</h2>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <div class="form-group mb-none">
                    <div class="input-group">
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="E-mail"
                            class="form-control input-lg @error('email') is-invalid @enderror">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="submit">Reset!</button>
                        </span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <p class="text-center mt-lg">Remembered? <a href="{{ route('admin.login.view') }}">Sign In!</a>
                </p>
            </form>
        </div>
    </div>
@endsection
