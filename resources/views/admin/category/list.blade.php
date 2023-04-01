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
                <a href="{{ route('admin.category.add') }}">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add
                        Category
                    </button>
                </a>

            </div>
            <h2 class="panel-title">Category List</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($category as $row)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                <img height="25px" width="25px"
                                    src="{{ $row->image == '' ? 'assets/images/projects/project-6.jpg' : asset('uploads/category') . '/' . $row->image }}"
                                    alt="{{ $row->category }}">
                            </td>
                            <td>
                                {{ $row->category }}
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $row->id]) }}"><button
                                        class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                </a>
                                <button type="button" id="deleteCategory" data-id="{{ $row->id }}"
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
        $("#datatable-default").on("click", "button#deleteCategory", function() {
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
                        var url = '{{ url('/admin/category/delete') }}' + '/' + id;
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
                                swal('Error', 'Category is in use', 'error');
                            }
                        });
                    }
                });
        });
    </script>
@endsection
