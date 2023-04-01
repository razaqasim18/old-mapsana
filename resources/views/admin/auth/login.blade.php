@extends('layouts.admin.auth')
@section('title')
    Sign In
@endsection
@section('main')
    <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
        </div>
        <div class="panel-body">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group mb-lg">
                    <label>Email</label>
                    <div class="input-group input-group-icon">
                        <input name="email" type="text"
                            class="form-control input-lg @error('email') is-invalid @enderror" />
                        <span class="input-group-addon">
                            <span class="icon icon-lg">
                                <i class="fa fa-user"></i>
                            </span>
                        </span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-lg">
                    <div class="clearfix">
                        <label class="pull-left">Password</label>
                        <a href="{{ route('admin.password.request') }}" class="pull-right">Lost Password?</a>
                    </div>
                    <div class="input-group input-group-icon">
                        <input name="password" type="password"
                            class="form-control input-lg @error('password') is-invalid @enderror" />
                        <span class="input-group-addon">
                            <span class="icon icon-lg">
                                <i class="fa fa-lock"></i>
                            </span>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                        <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign
                            In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
