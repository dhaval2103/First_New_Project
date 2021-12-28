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
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h2 class="mb-0">Cart</h2>

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
                                <div class="media border-bottom pb-3">
                                    <div class="mr-4">
                                        @foreach ($imageDetails as $img)
                                            <img src="{{ $img->image }}" alt="" class="avatar-lg">
                                        @endforeach
                                    </div>
                                    <div class="media-body align-self-center overflow-hidden" style="margin-left: 10px">
                                        <div>
                                            <h3 class="mb-1"><b>Brand : </b><span
                                                    class="font-weight-medium">{{ $watch->name }}</span>
                                            </h3>
                                            <p class="mb-1"><b>Title : </b><span
                                                    class="font-weight-medium">{{ $product->title }}</span>
                                            </p>
                                            <p class="mb-1"><b>Description : </b><span
                                                    class="font-weight-medium">{{ $product->description }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        {{-- <ul>
                                            <li><i class="fa fa-trash"></i></li>
                                        </ul> --}}
                                    </div>
                                </div>
                                <div>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="mb-2"><b>Price : </b></p>
                                                    <h5 class="font-size-16">{{ $product->price }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    @foreach ($cart as $carts)
                                                        <p class="mb-2"><b>Quantity : </b></p>
                                                        <div style="width: 110px;" class="product-cart-touchspin">
                                                            <input type="hidden" value="{{ request()->id }}"
                                                                class="product_ids">
                                                            <select name="qty" id="qty" class="form-control qty-add">
                                                                @if ($carts != null)
                                                                    @for ($i = 1; $i <= 10; $i++) <option value={{ $i }} @if (!empty($carts['quantity'] == $i)) selected @endif>
                                                                    {{ $i }}</option>
                                                                @endfor
                                                            @else
                                                                @for ($i = 1; $i <= 10; $i++)
                                                                    <option value={{ $i }}>
                                                                        {{ $i }}</option>
                                                                @endfor
                                                    @endif
                                                    </select>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-3">
                                                @foreach ($cart as $carts)
                                                    <p class="mb-2"><b>Total : </b></p>
                                                    @if ($carts != null)
                                                        <h5 class="font-size-16 total_price">
                                                            {{ $carts['price'] ?? null }}
                                                        </h5>
                                                    @else
                                                        <h5 class="font-size-16 total_price">{{ $product->price }}
                                                        </h5>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- end card -->
                    <br><br>
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
            var pid = $('.product_ids').val();
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

                    $('.total_price').html(response.data.price)
                    toastr.success('Select Quantity Add');
                }
            });
        });
    </script>
@endpush
