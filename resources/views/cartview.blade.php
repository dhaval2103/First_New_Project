@extends('userlayout.afterloginmaster')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>View Cart</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="main-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        {{-- <h2 class="mb-0">Cart</h2> --}}
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9">
                    <div class="card border shadow-none">
                        <div class="card-body">
                            <div class="row">
                            @foreach ($cart as $product)
                                <div class="col-md-4">
                                    @php
                                        $p = DB::table('products')
                                            ->where('id', $product->product_id)
                                            ->first();
                                        $watch = DB::table('watchbrands')
                                            ->where('id', $p->watch_id)
                                            ->first();
                                        $imageDetails = DB::table('images')
                                            ->where('product_id', $product->product_id)
                                            ->first();
                                    @endphp
                                    <div class="mr-4">
                                        <img src="{{ asset('images') . '/' . $imageDetails->image }}" alt=""
                                            class="avatar-lg">
                                    </div>
                                    <div class="media-body align-self-center overflow-hidden" style="margin-left: 10px">
                                        <div>
                                            <h3 class="mb-1"><b>Brand : </b><span
                                                    class="font-weight-medium">{{ $watch->name }}</span>
                                            </h3>
                                            <p class="mb-1"><b>Title : </b><span
                                                    class="font-weight-medium">{{ $p->title }}</span>
                                            </p>
                                            <p class="mb-1"><b>Description : </b><span
                                                    class="font-weight-medium">{{ $p->description }}</span>
                                            </p>
                                            <p class="mb-1"><b>Price : </b><span
                                                    class="font-weight-medium">{{ $p->price }}</span>
                                            </p>
                                        </div>
                                        <p class="mb-2"><b>Quantity : </b></p>
                                        <div style="width: 110px;" class="product-cart-touchspin">
                                            
                                            <select name="qty" id="qty" data-pid="{{ $product->product_id }}" class="form-control qty-add">
                                                @if ($product != null)
                                                    @for ($i = 1; $i <= 10; $i++) 
                                                        <option value={{ $i }} @if (!empty($product['quantity'] == $i)) selected @endif>{{ $i }}</option>
                                                    @endfor
                                                @else
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value={{ $i }}>{{ $i }}</option>
                                                    @endfor
                                                @endif
                                            </select>
                                        </div>
                                            <p class="mb-2"><b>Total Price : </b></p>
                                            @if ($product != null)
                                                <h5 class="font-size-16 total_price{{ $product->product_id }}">{{ $product['price'] ?? null }}</h5>
                                            @else
                                                <h5 class="font-size-16 total_price{{ $product->product_id }}">{{ $product->price }}</h5>
                                            @endif
                                    </div>
                                    <a href="{{ url('deletecart/' . $product->product_id) }}" class="btn btn-danger btn-sm">Remove</a>
                                </div>
                            @endforeach
                             </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- end card -->
    <div class="row mt-4">
        <div class="col-sm-6">
            <a href="{{ route('viewallproduct') }}" class="btn btn-light btn-lg text-muted">
                <i class="uil uil-arrow-left mr-1"></i>Continue Shopping</a>
        </div> <!-- end col -->
        <div class="col-sm-6">
            <div class="text-sm-right mt-2 mt-sm-0">
                <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">
                    <i class="uil uil-shopping-cart-alt mr-1"></i> Checkout </a>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row-->
    </div>

    <div class="col-xl-4">
        <div class="mt-5 mt-lg-0">
            <div class="card border shadow-none">

            </div>
        </div>
    </div>
    </div>
    <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on("change", '.qty-add', function() {
            var id = $(this).val();
            var pid = $(this).data('pid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: "{{ route('selectqty') }}",
                dataType: "json",
                data: {
                    id: id,
                    pid: pid,
                },
                success: function(response) {

                    $('.total_price'+response.data.product_id).html(response.data.price)
                    toastr.success('Select Quantity Add');
                }
            });
        });
    </script>
@endpush
