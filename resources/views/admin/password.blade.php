@extends('layouts.admin.dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
@endsection
@section('title')
    Profile
@endsection
@section('main')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Update Profile</h2>
        </header>
        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data"
            action="{{ route('admin.passwords.update') }}">
            @csrf
            <div class="panel-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </footer>
        </form>
    </section>
@endsection
@section('script')
    <script src="{{ asset('admin_assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
@endsection
