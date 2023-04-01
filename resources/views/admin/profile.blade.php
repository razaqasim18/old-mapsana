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
            action="{{ route('admin.profile.update') }}">
            @csrf
            <div class="panel-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::guard('admin')->user()->name }}" required="">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Image</label>
                    <div class="col-md-6">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input">
                                    <i class="fa fa-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                    <input type="hidden" name="showimage"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                </div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Select file</span>
                                    <input type="file" name="image">
                                </span>
                                <a href="#" class="btn btn-default fileupload-exists"
                                    data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary" fdprocessedid="jxg3pi">Submit</button>
                        <button type="reset" class="btn btn-default" fdprocessedid="dh1mdo">Reset</button>
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
