@extends('layouts.admin.dashboard')
@section('title')
    Dashboard
@endsection
@section('style')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
@endsection
@section('main')
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>
            <h2 class="panel-title">Edit Category</h2>
        </header>
        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data"
            action="{{ route('admin.category.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <section class="panel">

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Category</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="category" name="category"
                                        value="{{ $category->category }}" required>
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Upload Image</label>
                                <div class="col-md-6">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                @if ($category->image == '')
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                @else
                                                    <i class="fa fa-file"></i>
                                                    <span class="fileupload-preview">{{ $category->image }}</span>
                                                @endif
                                                <input type="hidden" name="showimage" value="{{ $category->image }}">
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="image" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
