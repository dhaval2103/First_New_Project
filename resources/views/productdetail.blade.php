@extends('userlayout.afterloginmaster')
@section('content')

    <body>

        <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="product-detail">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                                role="tablist" aria-orientation="vertical">
                                                                @foreach ($imageDetails as $img)

                                                                    <img src="{{ $img->image }}" alt=""
                                                                        class="img-fluid mx-auto d-block tab-img rounded">

                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="col-9">
                                                            <div class="tab-content position-relative"
                                                                id="v-pills-tabContent">

                                                                {{-- <div class="product-wishlist">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div> --}}
                                                                <div class="tab-pane fade show active" id="product-1"
                                                                    role="tabpanel">
                                                                    <div class="product-img">
                                                                        @foreach ($imageDetails as $img)

                                                                        @endforeach
                                                                        <img src="{{ $img->image }}" alt=""
                                                                            class="img-thumbnail">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row text-center mt-2">
                                                                <div class="col-sm-6">
                                                                    <form action="" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="user_id" value="">
                                                                        <input type="hidden" id="product_id"
                                                                            name="product_id" value="">
                                                                        <button type="button" id="addtocart"
                                                                            class="btn btn-warning btn-block waves-effect waves-light mt-2 mr-1"
                                                                            data-id="{{ request()->id }}"><i
                                                                                style="color: rgb(234, 234, 243)"
                                                                                class="uil uil-shopping-cart-alt mr-2"></i>Add
                                                                            To Cart</button>
                                                                    </form>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-block waves-effect  mt-2 waves-light"><a
                                                                            href="{{ url('cartview/' . request()->id) }}"
                                                                            style="color:rgb(247, 242, 242)"><i
                                                                                class="uil uil-shopping-basket mr-2"></i>Buy
                                                                            now</a></button>
                                                                    {{-- <button type="button" id="buynow"
                                                                        class="btn btn-danger btn-block waves-effect  mt-2 waves-light"
                                                                        data-id="{{ request()->id }}"><i
                                                                            style="color:rgb(247, 242, 242)"
                                                                            class="uil uil-shopping-basket mr-2"></i>Buy
                                                                        Now</button> --}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="mt-4 mt-xl-3 pl-xl-4">
                                                    <h2 class="font-size-25 text-muted">{{ $watch->name }}</h2>
                                                    <h3 class="font-size-15 text-muted">{{ $product->title }}</h3>
                                                    <h4 class="mt-4 text-muted">{{ $product->description }}</h4>
                                                    <h2 class="text-muted">{{ $product->price }}/-</h2>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
    @endsection
    @push('js')
        <script>
            $(document).on("click", '#addtocart', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('addtocart') }}",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 1) {
                            toastr.success('Done');
                        }
                    }
                });
            });
        </script>
    @endpush
