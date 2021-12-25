@extends('userlayout.afterloginmaster')
@section('content')
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
                    <div class="col-xl-8">
                        <div class="card border shadow-none">
                            <div class="card-body">

                                <div class="media border-bottom pb-3">
                                    {{-- @foreach ($imageDetails as $img) --}}

                                    <img src="{{ $imageDetails->image }}" alt=""
                                        class="img-fluid mx-auto d-block tab-img rounded">

                                    {{-- @endforeach --}}
                                    <div class="media-body align-self-center overflow-hidden">
                                        <div>
                                            <h5 class="text-truncate font-size-16"><a href="ecommerce-product-detail.html"
                                                    class="text-dark">{{ $watch->name }}</a></h5>
                                            <p class="mb-1">Title : <span
                                                    class="font-weight-medium">class="font-weight-medium">{{ $product->title }}</span>
                                            </p>
                                            <p>Description : <span
                                                    class="font-weight-medium">class="font-weight-medium">{{ $product->description }}</span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <ul class="list-inline mb-0 font-size-16">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top"
                                                title="Remove">
                                                {{-- <a href="#" class="text-muted px-2">
                                                <i class="uil uil-trash-alt"></i>
                                            </a> --}}
                                                <button class="btn btn-light" id="deletecart">
                                                    <i class="uil uil-trash-alt"></i>
                                                </button>
                                            </li>
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top"
                                                title="Add Wishlist">
                                                {{-- <a href="#" class="text-muted px-2">
                                                <i class="uil uil-heart"></i>
                                            </a> --}}
                                                <button class="btn btn-light">
                                                    <i class="uil uil-heart"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Price</p>
                                                    <h5 class="font-size-16">{{ $product->price }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Quantity</p>
                                                    <div style="width: 110px;" class="product-cart-touchspin">
                                                        <input type="hidden" value="{{ request()->id }}"
                                                            class="product_ids">



                                                        <select name="" id="" class="form-control qty-add">
                                                            @for ($i = 1; $i <= 10; $i++) <option value={{ $i }} @if (!empty($cart['quantity'] == $i)) selected @endif>
                                                            {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Total</p>
                                                    <h5 class="font-size-16">{{ $cart['price'] ?? null }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <!-- end card -->

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="{{ route('viewallproduct') }}" class="btn btn-link text-muted">
                                    <i class="uil uil-arrow-left mr-1"></i> Continue Shopping </a>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-sm-right mt-2 mt-sm-0">
                                    <a href="ecommerce-checkout.html" class="btn btn-success">
                                        <i class="uil uil-shopping-cart-alt mr-1"></i> Checkout </a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div>

                    <div class="col-xl-4">
                        <div class="mt-5 mt-lg-0">
                            <div class="card border shadow-none">
                                <div class="card-header bg-transparent border-bottom py-3 px-4">
                                    <h5 class="font-size-16 mb-0">Order Summary <span class="float-right">#MN0124</span>
                                    </h5>
                                </div>
                                <div class="card-body p-4">

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td class="text-right">$ 780</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount : </td>
                                                    <td class="text-right">- $ 78</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge :</td>
                                                    <td class="text-right">$ 25</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimated Tax : </td>
                                                    <td class="text-right">$ 18.20</td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th>Total :</th>
                                                    <td class="text-right">
                                                        <span class="font-weight-bold">
                                                            $ 745.2
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
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
        $(document).on("click", '#deletecart', function() {
            var id = $(this).data('id');
            var element = this;
            if (confirm('Are You Sure Want To Delete This...???')) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('deletecart') }}",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        toastr.error('Product-cart Delete Successfully');
                    }
                });
            }
        });

        $(document).on("change", '.qty-add', function() {


        });
    </script>
@endpush
