@extends('userlayout.master')
@section('content')

    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Product Grid</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="container-fluid" style="border: none;">
            <div class="row">
                @foreach ($image as $photo)
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <button class="btn btn-warning shop">Add To Cart</button>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ $photo[0]->image }}" alt="">
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                    @foreach ($image as $photo)
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <button class="btn btn-warning shop">Add To Cart</button>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="{{ $photo[0]->image }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div> --}}
            </div>
            <div class="btn-box">

            </div>
        </div>
    </section>
@endsection
