@extends('adminlayout.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h1>Order List</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts() }}
@endpush
