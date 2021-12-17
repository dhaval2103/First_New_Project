@extends('adminlayout.master');

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
            <h1>Product List</h1>
            <div class="row">
                <div class="col-12"><br>
                    <button class="btn btn-primary"><i class="fa fa-plus">&nbsp;Add Product</i></button>
                    <div class="card-body">

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
    {{-- {{ $dataTable->scripts() }} --}}

    <script>
        /* $("#register").validate({
                            rules: {
                                'title': {
                                    required: true
                                },
                                'description': {
                                    required: true
                                },
                                'price': {
                                    required: true
                                },
                                messages: {
                                    'title': {
                                        required: 'Please Enter Title..!!',
                                    },
                                    'description': {
                                        required: 'please Enter Desription..!!',
                                    },
                                    'price': {
                                        requuired: 'Please Enter Price..!!',
                                    },
                                },
                                submitHandler: function(form) {
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        },
                                        type: "POST",
                                        url: "{{ route('admin.addproduct') }}",
                                        data: new FormData(form),
                                        dataType: "json",
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        success: function(data) {
                                            if (data == 1) {
                                                $('#userdatatable-table').DataTable().ajax.reload();
                                                $('#addproductModal').modal('hide');
                                                toastr.success('Product Add Successfully');
                                            }
                                        },
                                        error: function(response) {
                                            $.each(response.responseJSON.errors, function(field_name, errors) {
                                                $('[name=' + field_name + ']').after(
                                                    '<span class="text-strong" style="color:red">' +
                                                    errors + '</span>')
                                            })
                                        }
                                    });
                                }
                            }
                        }); */
    </script>
@endpush
