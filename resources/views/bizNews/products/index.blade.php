@extends('bizNews.layouts.main')

@section('components')
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

@endsection

@section('content')

    <!-- News Detail Start -->

    <h1>These are our products</h1>
    <hr>
{{--    <button class="btn btn-success m-3" onclick="showProducts()">Show Products</button>--}}
    @foreach($products as $product)
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->cost }}</p>
        <p>{{ $product->count }}</p>
        <p>{{ $product->description }}</p>
        <hr>
    @endforeach
{{--    <hr>--}}
{{--    <div id="productsList"></div>--}}

@endsection
