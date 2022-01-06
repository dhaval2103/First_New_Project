@extends('adminlayout.master')

@section('content')
    <div class="content-wrapper">
        {{-- <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> --}}

        <section class="content">
            <h1>User Detail</h1>
            <div class="row">
                <div class="col-12">
                    {{-- user edit modal --}}
                    <div class="modal fade" id="usereditmodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Edit User-Detail</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="userform">
                                        <input type="hidden" class="form-control userofid" name="id">
                                        <div class="alert alert-success d-none" id="msg_div">
                                            <span id="res_message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_name" class="col-form-label">User Name :</label>
                                            <input type="text" class="form-control uname" name="uname">
                                            @error('uname')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email :</label><br>
                                            <input type="email" class="form-control email" name="email">
                                            @error('email')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <div id="msgdisplay"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end useredit data --}}

                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>


    {{-- <div>
            {{ $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) }}
        </div> --}}
    </div>

@endsection
@push('js')
    {{ $dataTable->scripts() }}

    <script>
        // $(document).on("click", '.add', function() {

        //     $('#title').val('');
        //     $('#frmid').val('');
        //     $('#description').val('');
        //     $('#price').val('');
        //     $('#imageshow').prop('src', '');

        // });
        $(document).on("click", '.edituser', function() {
            var id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: "{{ route('admin.edituserdata') }}",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(response) {
                    $('.userofid').val(response.id);
                    $('.uname').val(response.name);
                    $('.email').val(response.email);
                }
            });
        });

        $("#userform").validate({
            rules: {
                'uname': {
                    required: true
                },
                'email': {
                    required: true
                },
            },
            messages: {
                'uname': {
                    required: "Please Enter User_Name...!!!"
                },
                'email': {
                    required: "Please Enter Your MailID...!!!"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('admin.updateuserdata') }}",
                    contentType: false,
                    processData: false,
                    data: new FormData(form),
                    success: function(data) {
                        if (data == 1) {
                            $('#userdatatable-table').DataTable().ajax.reload();
                            $('#usereditmodal').modal('hide');
                            toastr.success('Update Successfully');
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        $.each(response.responseJSON.errors, function(field_name, errors) {
                            $('[name=' + field_name + ']').after(
                                '<span class="text-strong" style="color:red">' +
                                errors + '</span>')
                        })
                    }
                });
            }
        });
        $("#usereditmodal").on('hide.bs.modal', function() {
            $(".error").empty();
        });

        $(document).on("click", '#deletedata', function() {
            var id = $(this).data('id');
            if (confirm("Are You Sure Want To Delete This...???")) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('admin.deleteuserdata') }}",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#userdatatable-table').DataTable().ajax.reload();
                        toastr.error('Delete Successfully');
                    }
                });
            } else {
                return false;
            }
        });

        $(document).on("click", '.ids', function() {
            var a = $(this).data('id');
            $('#userid').val(a);
        });

        // $("#register").validate({
        //     rules: {
        //         'title': {
        //             required: true
        //         },
        //         'description': {
        //             required: true
        //         },
        //         'price': {
        //             required: true
        //         },
        //         messages: {
        //             'title': {
        //                 required: 'Please Enter Title..!!',
        //             },
        //             'description': {
        //                 required: 'please Enter Desription..!!',
        //             },
        //             'price': {
        //                 requuired: 'Please Enter Price..!!',
        //             },
        //         },
        //         submitHandler: function(form) {
        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //                 },
        //                 type: "POST",
        //                 url: "{{ route('admin.addproduct') }}",
        //                 data: new FormData(form),
        //                 dataType: "json",
        //                 contentType: false,
        //                 processData: false,
        //                 cache: false,
        //                 success: function(data) {
        //                     if (data == 1) {
        //                         $('#userdatatable-table').DataTable().ajax.reload();
        //                         $('#addproductModal').modal('hide');
        //                         toastr.success('Product Add Successfully');
        //                     }
        //                 },
        //                 error: function(response) {
        //                     $.each(response.responseJSON.errors, function(field_name, errors) {
        //                         $('[name=' + field_name + ']').after(
        //                             '<span class="text-strong" style="color:red">' +
        //                             errors + '</span>')
        //                     })
        //                 }
        //             });
        //         }
        //     }
        // });
    </script>
@endpush
