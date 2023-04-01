@extends('layouts.admin.dashboard')
@section('title')
    Dashboard
@endsection
@section('style')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
@endsection
@section('main')
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="{{ route('admin.doctor.add') }}">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add
                        Doctor
                    </button>
                </a>

            </div>
            <h2 class="panel-title">Doctor List</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Restricted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($doctor as $row)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            {{-- <td>
                                 <img height="25px" width="25px"
                                    src="{{ $row->image == '' ? 'assets/images/projects/project-6.jpg' : asset('uploads/category') . '/' . $row->image }}"
                                    alt="{{ $row->category }}">
                            </td> --}}
                            <td>
                                {{ $row->first_name . ' ' . $row->last_name }}
                            </td>
                            <td>
                                {{ $row->email }}
                            </td>
                            <td>
                                @if ($row->status == '1')
                                    <button type="button"
                                        class="mb-xs mt-xs mr-xs btn btn-xs btn-primary">Verified</button>
                                @elseif($row->status == '2')
                                    <button type="button"
                                        class="mb-xs mt-xs mr-xs btn btn-xs btn-success">Approved</button>
                                @elseif($row->status == '3')
                                    <button type="button"
                                        class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">Suspended</button>
                                @else
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-info">Pending</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->is_blocked == '1')
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">Blocked</button>
                                @else
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-info">Active</button>
                                @endif
                            </td>
                            <td>
                                @if (!$row->is_blocked)
                                    <button type="button" id="blockDoctor" data-id="{{ $row->id }}"
                                        class="btn btn-warning btn-xs" data-status="1">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                @else
                                    <button type="button" id="blockDoctor" data-id="{{ $row->id }}"
                                        class="btn btn-info btn-xs" data-status="0">
                                        <i class="fa fa-unlock"></i>
                                    </button>
                                @endif
                                @if ($row->status == '1')
                                    <button type="button" id="approveDoctor" data-id="{{ $row->id }}"
                                        class="btn btn-success btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                @endif
                                <button type="button" id="deleteDoctor" data-id="{{ $row->id }}"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('admin_assets/javascripts/tables/examples.datatables.default.js') }}"></script>
    <script src="{{ asset('admin_assets/javascripts/tables/examples.datatables.row.with.details.js') }}"></script>
    <script src="{{ asset('admin_assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{ asset('admin_assets/vendor/select2/select2.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script src="{{ asset('admin_assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
    <script>
        $("#datatable-default").on("click", "button#deleteDoctor", function() {
            var id = $(this).data("id");
            swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this action!',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Yes!",
                    closeOnConfirm: false
                },
                function(willDelete) {
                    if (willDelete) {
                        var token = $("meta[name='csrf-token']").attr("content");
                        var url = '{{ url('/admin/doctor/delete') }}' + '/' + id;
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            beforeSend: function() {
                                $(".loader").show();
                            },
                            complete: function() {
                                $(".loader").hide();
                            },
                            success: function(response) {
                                var typeOfResponse = response.type;
                                var res = response.msg;
                                if (typeOfResponse == 0) {
                                    swal('Error', res, 'error');
                                } else if (typeOfResponse == 1) {
                                    swal({
                                        title: 'Success',
                                        text: res,
                                        icon: 'success',
                                        type: 'success',
                                        showCancelButton: false, // There won't be any cancel button
                                        showConfirmButton: true // There won't be any confirm button
                                    }, function(oK) {
                                        if (oK) {
                                            location.reload();
                                        }
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                swal('Error', 'Doctor is in use', 'error');
                            }
                        });
                    }
                });
        });

        $("#datatable-default").on("click", "button#approveDoctor", function() {
            var id = $(this).data("id");
            swal({
                    title: 'Are you sure?',
                    text: 'You want to approve this doctor!',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Yes!",
                    closeOnConfirm: false
                },
                function(willDelete) {
                    if (willDelete) {
                        // var token = $("meta[name='csrf-token']").attr("content");
                        var url = '{{ url('/admin/doctor/approve') }}' + '/' + id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            // data: {
                            //     "id": id,
                            //     "_token": token,
                            // },
                            beforeSend: function() {
                                $(".loader").show();
                            },
                            complete: function() {
                                $(".loader").hide();
                            },
                            success: function(response) {
                                var typeOfResponse = response.type;
                                var res = response.msg;
                                if (typeOfResponse == 0) {
                                    swal('Error', res, 'error');
                                } else if (typeOfResponse == 1) {
                                    swal({
                                        title: 'Success',
                                        text: res,
                                        icon: 'success',
                                        type: 'success',
                                        showCancelButton: false, // There won't be any cancel button
                                        showConfirmButton: true // There won't be any confirm button
                                    }, function(oK) {
                                        if (oK) {
                                            location.reload();
                                        }
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                swal('Error', 'Something went wrong', 'error');
                            }
                        });
                    }
                });
        });

        $("#datatable-default").on("click", "button#blockDoctor", function() {
            var id = $(this).data("id");
            var status = $(this).data("status");
            let textmsg = status ? 'You want to block this user' : 'You want to active this user';
            swal({
                    title: 'Are you sure?',
                    text: textmsg,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Yes!",
                    closeOnConfirm: false
                },
                function(willDelete) {
                    if (willDelete) {
                        // var token = $("meta[name='csrf-token']").attr("content");
                        var url = '{{ url('/admin/doctor/block') }}' + '/' + id + '/' + status;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            // data: {
                            //     "id": id,
                            //     "_token": token,
                            // },
                            beforeSend: function() {
                                $(".loader").show();
                            },
                            complete: function() {
                                $(".loader").hide();
                            },
                            success: function(response) {
                                var typeOfResponse = response.type;
                                var res = response.msg;
                                if (typeOfResponse == 0) {
                                    swal('Error', res, 'error');
                                } else if (typeOfResponse == 1) {
                                    swal({
                                        title: 'Success',
                                        text: res,
                                        icon: 'success',
                                        type: 'success',
                                        showCancelButton: false, // There won't be any cancel button
                                        showConfirmButton: true // There won't be any confirm button
                                    }, function(oK) {
                                        if (oK) {
                                            location.reload();
                                        }
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                swal('Error', 'Something went wrong', 'error');
                            }
                        });
                    }
                });
        });
    </script>
@endsection
