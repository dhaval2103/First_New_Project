@extends('adminlayout.master')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <h1>Product List</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card-body">

                        <button class="btn btn-primary"><a href="{{ route('admin.addproduct') }}"><i class="fa fa-plus"
                                    style="color: rgb(70, 67, 67)">&nbsp;<b>Add Product</b></i></a></button>
                        <br><br>
                        {{ $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>

@endsection

@push('js')
    {{ $dataTable->scripts() }}

    <script>
        $(document).on("click", '#deletedata', function() {
            var id = $(this).data('id');
            var element = this;
            if (confirm("Are You Sure Want To Delete This..??")) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('admin.productdelete') }}",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#productdatatable-table').DataTable().ajax.reload();
                        toastr.error('Product Delete Successfully');
                    }
                });
            } else {
                return false;
            }
        });
    </script>

@endpush
