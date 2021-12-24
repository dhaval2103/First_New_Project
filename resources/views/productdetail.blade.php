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
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-block waves-effect waves-light mt-2 mr-1"><i
                                                                            style="color: rgb(234, 234, 243)"
                                                                            class="uil uil-shopping-cart-alt mr-2"></i>Add
                                                                        To Cart</button>
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
