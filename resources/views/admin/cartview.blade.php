@extends('adminlayout.master')
<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>
            <!-- Left Sidebar End -->

            

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
                                    <h4 class="mb-0">Cart</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.productdetail') }}">Product</a></li>
                                            <li class="breadcrumb-item active">Cart</li>
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
                                            <div class="mr-4">
                                                <img src="{{ $cart->image }}" alt="" class="avatar-lg">
                                            </div>
                                            <div class="media-body align-self-center overflow-hidden">
                                                <div>
                                                    <h5 class="text-truncate font-size-16"><a href="ecommerce-product-detail.html" class="text-dark">Nike N012 Running Shoes</a></h5>
                                                    <p class="mb-1">Color : <span class="font-weight-medium">Gray</span></p>
                                                    <p>Size : <span class="font-weight-medium">08</span></p>
                                                </div>
                                            </div>
                                            <div class="ml-2">
                                                <ul class="list-inline mb-0 font-size-16">
                                                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Remove">
                                                        <a href="#" class="text-muted px-2">
                                                            <i class="uil uil-trash-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add Wishlist">
                                                        <a href="#" class="text-muted px-2">
                                                            <i class="uil uil-heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Price</p>
                                                        <h5 class="font-size-16">$260</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Quantity</p>
                                                        <div style="width: 110px;" class="product-cart-touchspin">
                                                            <input data-toggle="touchspin" type="text" value="02">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Total</p>
                                                        <h5 class="font-size-16">$520</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card border shadow-none">
                                    <div class="card-body">

                                        <div class="media border-bottom pb-3">
                                            <div class="mr-4">
                                                <img src="assets/images/product/img-2.png" alt="" class="avatar-lg">
                                            </div>
                                            <div class="media-body align-self-center overflow-hidden">
                                                <div>
                                                    <h5 class="text-truncate font-size-16"><a href="ecommerce-product-detail.html" class="text-dark">Adidas Running Shoes</a></h5>
                                                    <p class="mb-1">Color : <span class="font-weight-medium">Black</span></p>
                                                    <p>Size : <span class="font-weight-medium">09</span></p>
                                                </div>
                                            </div>
                                            <div class="ml-2">
                                                <ul class="list-inline mb-0 font-size-16">
                                                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Remove">
                                                        <a href="#" class="text-muted px-2">
                                                            <i class="uil uil-trash-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add Wishlist">
                                                        <a href="#" class="text-muted px-2">
                                                            <i class="uil uil-heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Price</p>
                                                        <h5 class="font-size-16">$260</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Quantity</p>
                                                        <div style="width: 110px;" class="product-cart-touchspin">
                                                            <input data-toggle="touchspin" type="text" value="01">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Total</p>
                                                        <h5 class="font-size-16">$260</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <a href="ecommerce-products.html" class="btn btn-link text-muted">
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
                                            <h5 class="font-size-16 mb-0">Order Summary <span class="float-right">#MN0124</span></h5>
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
                <!-- End Page-content -->

               
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

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

        <!-- Bootrstrap touchspin -->
        <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <!-- init js -->
        <script src="{{ asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    </body>