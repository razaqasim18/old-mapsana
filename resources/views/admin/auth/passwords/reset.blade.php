@extends('layouts.admin.auth')
@section('title')
    Reset Password
@endsection
@section('main')
    <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Reset Password</h2>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group mb-lg">
                    <label>Email</label>
                    <div class="input-group input-group-icon">
                        <input id="email" type="email"
                            class="form-control input-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
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
                    </div>
                    <div class="input-group input-group-icon">
                        <input id="password" name="password" type="password"
                            class="form-control input-lg @error('password') is-invalid @enderror" required
                            autocomplete="new-password" />
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

                <div class="form-group mb-lg">
                    <div class="clearfix">
                        <label class="pull-left">Confirm Password</label>
                    </div>
                    <div class="input-group input-group-icon">
                        <input id="password-confirm" type="password" class="form-control input-lg"
                            name="password_confirmation" required autocomplete="new-password" />
                        <span class="input-group-addon">
                            <span class="icon icon-lg">
                                <i class="fa fa-lock"></i>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary hidden-xs">Reset Password</button>
                        <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Reset
                            Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
