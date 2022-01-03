@extends('userlayout.afterloginmaster')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Checkout</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <div id="layout-wrapper">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h2 class="mb-0">Checkout</h2>

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
                        <div class="custom-accordion">
                            <div class="card">
                                <a href="#checkout-billinginfo-collapse" class="text-dark" data-toggle="collapse">
                                    <div class="p-4">

                                        <div class="media align-items-center">
                                            <div class="mr-3">
                                                <i class="uil uil-receipt text-primary h2"></i>
                                            </div>
                                            <div class="media-body overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Billing Info</h5>
                                            </div>
                                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                        </div>

                                    </div>
                                </a>

                                <div id="checkout-billinginfo-collapse" class="collapse show">
                                    <div class="p-4 border-top">
                                        <form action="{{ route('customerdetail') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="userid">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-4">
                                                            <label for="billing-name">Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Enter name">
                                                            @error('name')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-4">
                                                            <label for="billing-email-address">Email Address</label>
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Enter email">
                                                            @error('email')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-4">
                                                            <label for="billing-phone">Phone</label>
                                                            <input type="numeric" class="form-control" name="phone"
                                                                placeholder="Enter Phone no." maxlength="10">
                                                            @error('phone')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="billing-address">Address</label>
                                                    <textarea class="form-control" name="address" rows="3"
                                                        placeholder="Enter full address"></textarea>
                                                    @error('address')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row my-4">
                                                <div class="col">
                                                    <a href="{{ route('viewallproduct') }}"
                                                        class="btn btn-light btn-lg text-muted">
                                                        <i class="uil uil-arrow-left mr-1"></i> Continue Shopping </a>
                                                </div> <!-- end col -->
                                                <div class="col">
                                                    <div class="text-sm-right mt-2 mt-sm-0">
                                                        <button type="submit" class="btn btn-success btn-lg"><i
                                                                class="uil uil-shopping-cart-alt mr-1"></i>Proceed</button>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-xl-4">
                        <div class="card checkout-order-summary">
                            <div class="card-body">
                                <div class="p-3 bg-light mb-4">
                                </div>
                                @foreach ($cart as $product)
                                    <div class="table-responsive">
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

                                        <table class="table table-centered mb-0 table-nowrap">
                                            <thead>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><img
                                                            src="{{ asset('images') . '/' . $imageDetails->image }}"
                                                            alt="product-img" title="product-img" class="avatar-md">
                                                    </th>
                                                    <td>
                                                        <h5 class="mb-1"><b>Brand : </b><span
                                                                class="font-weight-medium">{{ $watch->name }}</span>
                                                        </h5>
                                                        <p class="mb-1"><b>Title : </b><span
                                                                class="font-weight-medium">{{ $p->title }}</span>
                                                        </p>
                                                        <p class="mb-1"><b>Description : </b><span
                                                                class="font-weight-medium">{{ $p->description }}</span>
                                                        </p>
                                                        <p class="mb-1"><b>Price : </b><span
                                                                class="font-weight-medium">{{ $p->price }}</span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-2"><b>Total Price : </b></p>
                                                        @if ($product != null)
                                                            <h5 class="font-size-16 total_price">
                                                                {{ $product['price'] ?? null }}</h5>
                                                        @else
                                                            <h5 class="font-size-16 total_price">{{ $p->price }}
                                                            </h5>
                                                        @endif
                                                    </td>
                                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>

    </div>
    <div class="rightbar-overlay"></div>
@endsection
