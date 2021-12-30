@extends('userlayout.afterloginmaster')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h1>Order History</h1>
            <div class="row">
                <div class="col-12">
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                    </div>
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