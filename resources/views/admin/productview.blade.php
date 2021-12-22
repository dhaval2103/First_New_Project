@extends('adminlayout.master');

{{-- @section('content')
    <div class="content-wrapper">
        <section class="content" style="border: none;">
            <h1>View Product</h1>
            <div class="container-fluid" style="border:none;">
                <div class="row">
                    @foreach ($product as $products)
                        <div class="card" style="width:500px;margin-right: 40px;background-color: transparent">
                            <div class="cardbody">
                                <img src="{{ $products->image }}" class="img-thumbnail" id="imageshow" height="150px">
                                <h3>{{ $products->title }}</h3>
                                <b>{{ $products->description }}</b>
                                <h3>{{ $products->price }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection --}}

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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h1 class="mb-0">Product View</h1>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('admin.productdetail') }}">Products</a>
                                        </li>
                                        <li class="breadcrumb-item active">Product View</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="product-detail">
                                                <div class="row">
                                                    @php
                                                        $watch = DB::table('watchbrands')
                                                            ->where('id', $product->watch_id)
                                                            ->first();
                                                    @endphp
                                                    <div class="col-3">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                            role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="product-1-tab"
                                                                data-toggle="pill" href="#product-1" role="tab">
                                                                <img src=" {{ $product->image }}" alt=""
                                                                    class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-2-tab"
                                                                data-toggle="pill" href="#product-2" role="tab">
                                                                <img src="{{ $product->image }}" alt=""
                                                                    class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-3-tab"
                                                                data-toggle="pill" href="#product-3" role="tab">
                                                                <img src="{{ $product->image }}" alt=""
                                                                    class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-4-tab"
                                                                data-toggle="pill" href="#product-4" role="tab">
                                                                <img src="{{ $product->image }}" alt=""
                                                                    class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
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
                                                                    <img src="{{ $product->image }}" alt=""
                                                                        class="img-thumbnail">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="{{ $product->image }}" alt=""
                                                                        class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-3" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="{{ $product->image }}" alt=""
                                                                        class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-4" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="{{ $product->image }}" alt=""
                                                                        class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center mt-2">
                                                            <div class="col-sm-6">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block waves-effect waves-light mt-2 mr-1"><a
                                                                        href="{{ url('Admin/cartview/' . $product->id) }}"><i
                                                                            style="color: rgb(234, 234, 243)"
                                                                            class="uil uil-shopping-cart-alt mr-2"></i>Add
                                                                        To Cart</a></button>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <button type="button"
                                                                    class="btn btn-light btn-block waves-effect  mt-2 waves-light">
                                                                    <i class="uil uil-shopping-basket mr-2"></i>Buy now
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="mt-4 mt-xl-3 pl-xl-4">
                                                <h2 class="font-size-25">{{ $watch->name }}</h2>
                                                <h3 class="font-size-20 mb-3">{{ $product->title }}</h3>

                                                <div class="text-muted">
                                                    <span class="badge badge-success font-size-14 mr-1"><i
                                                            class="mdi mdi-star"></i> 4.2</span> 234 Reviews
                                                </div>

                                                <h5 class="mt-4 pt-2"><del
                                                        class="text-muted mr-2">$22080</del>${{ $product->price }}
                                                    <span class="text-danger font-size-14 ml-2">- 20 % Off</span>
                                                </h5>

                                                <p class="mt-4 text-muted">{{ $product->description }}</p>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mt-3">

                                                                <h5 class="font-size-14">Specification :</h5>
                                                                <ul class="list-unstyled product-desc-list text-muted">
                                                                    <li><i
                                                                            class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                        High Quality</li>
                                                                    <li><i
                                                                            class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                        Leather</li>
                                                                    <li><i
                                                                            class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                        All Sizes available</li>
                                                                    <li><i
                                                                            class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                        4 Different Color</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mt-3">
                                                                <h5 class="font-size-14">Services :</h5>
                                                                <ul class="list-unstyled product-desc-list text-muted">
                                                                    <li><i
                                                                            class="uil uil-exchange text-primary mr-1 font-size-16"></i>
                                                                        10 Days Replacement</li>
                                                                    <li><i
                                                                            class="uil uil-bill text-primary mr-1 font-size-16"></i>
                                                                        Cash on Delivery available</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="mt-3">

                                                        <h5 class="font-size-14 mb-3"><i
                                                                class="uil uil-location-pin-alt font-size-20 text-primary align-middle mr-2"></i>
                                                            Delivery location</h5>

                                                        <div class="form-inline">

                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Delivery pincode ">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-light"
                                                                        type="button">Check</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div> --}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    {{-- <div class="mt-4">
                                        <h5 class="font-size-14 mb-3">Product description: </h5>
                                        <div class="product-desc">
                                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="desc-tab" data-toggle="tab"
                                                        href="#desc" role="tab">Description</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="specifi-tab" data-toggle="tab"
                                                        href="#specifi" role="tab">Specifications</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content border border-top-0 p-4">
                                                <div class="tab-pane fade" id="desc" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2">
                                                            <div>
                                                                <img src="assets/images/product/img-6.png" alt=""
                                                                    class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9 col-md-10">
                                                            <div class="text-muted p-2">
                                                                <p>If several languages coalesce, the grammar of the
                                                                    resulting language is more simple and regular</p>
                                                                <p>Everyone realizes why a new common language would be
                                                                    desirable, one could refuse to pay expensive
                                                                    translators.</p>
                                                                <p>It will be as simple as occidental in fact.</p>

                                                                <div>
                                                                    <ul
                                                                        class="list-unstyled product-desc-list text-muted">
                                                                        <li><i
                                                                                class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                            Sed ut perspiciatis omnis iste</li>
                                                                        <li><i
                                                                                class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                            Neque porro quisquam est</li>
                                                                        <li><i
                                                                                class="mdi mdi-circle-medium mr-1 align-middle"></i>
                                                                            Quis autem vel eum iure</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="width: 20%;">Category</th>
                                                                    <td>Shoes</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Brand</th>
                                                                    <td>Nike</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Color</th>
                                                                    <td>Gray</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Quality</th>
                                                                    <td>High</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Material</th>
                                                                    <td>Leather</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="mt-4">
                                        <h5 class="font-size-14 mb-3">Reviews : </h5>
                                        <div class="text-muted mb-3">
                                            <span class="badge badge-success font-size-14 mr-1"><i
                                                    class="mdi mdi-star"></i> 4.2</span> 234 Reviews
                                        </div>
                                        <div class="border p-4 rounded">
                                            <div class="border-bottom pb-3">
                                                <p class="float-sm-right text-muted font-size-13">12 July, 2020</p>
                                                <div class="badge badge-success mb-2"><i class="mdi mdi-star"></i>
                                                    4.1</div>
                                                <p class="text-muted mb-4">It will be as simple as in fact, it will be
                                                    Occidental. It will seem like simplified</p>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="font-size-15 mb-0">Samuel</h5>
                                                    </div>

                                                    <ul class="list-inline product-review-link mb-0">
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Like">
                                                            <a href="#"><i class="uil uil-thumbs-up"></i></a>
                                                        </li>
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Comment">
                                                            <a href="#"><i class="uil uil-comment-alt-message"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="border-bottom py-3">
                                                <p class="float-sm-right text-muted font-size-13">06 July, 2020</p>
                                                <div class="badge badge-success mb-2"><i class="mdi mdi-star"></i>
                                                    4.0</div>
                                                <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus
                                                    error sit</p>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="font-size-15 mb-0">Joseph</h5>
                                                    </div>

                                                    <ul class="list-inline product-review-link mb-0">
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Like">
                                                            <a href="#"><i class="uil uil-thumbs-up"></i></a>
                                                        </li>
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Comment">
                                                            <a href="#"><i class="uil uil-comment-alt-message"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="border-bottom py-3">
                                                <p class="float-sm-right text-muted font-size-13">26 June, 2020</p>
                                                <div class="badge badge-success mb-2"><i class="mdi mdi-star"></i>
                                                    4.2</div>
                                                <p class="text-muted mb-4">Neque porro quisquam est, qui dolorem ipsum
                                                    quia dolor sit amet</p>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="font-size-15 mb-0">Paul</h5>
                                                    </div>

                                                    <ul class="list-inline product-review-link mb-0">
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Like">
                                                            <a href="#"><i class="uil uil-thumbs-up"></i></a>
                                                        </li>
                                                        <li class="list-inline-item" data-toggle="tooltip"
                                                            data-placement="top" title="Comment">
                                                            <a href="#"><i class="uil uil-comment-alt-message"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>
