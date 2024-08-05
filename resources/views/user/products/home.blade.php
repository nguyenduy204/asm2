@extends('user.layouts.index')
@section('title')
    @parent
    Trang chủ
@endsection
@section('content')
<!-- new-products section start -->
<section class="featured-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>Sản phẩm</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="product-tab nav nav-tabs">
                    <ul>                                        
                        <li class="active"><a data-toggle="tab" href="#all">All</a></li>
                        @foreach($categories as $category)
                            <li><a data-toggle="tab" href="#category-{{ $category->category_id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row tab-content">
            <div class="tab-pane fade in active" id="all">
                <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                    @foreach($allProducts as $product)
                        @include('user.products.product', ['product' => $product])
                    @endforeach
                </div>
            </div>
            @foreach($categories as $category)
                <div class="tab-pane fade" id="category-{{ $category->category_id }}">
                    <div id="tab-carousel-{{ $category->category_id }}" class="re-owl-carousel owl-carousel product-slider owl-theme">
                        @foreach($allProducts->where('category_id', $category->category_id) as $product)
                            @include('user.products.product', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- new-products section end -->

<!-- new-products section start -->
<section class="new-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>Sản phẩm mới</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="new-products" class="owl-carousel product-slider owl-theme">
                @foreach($newProducts as $product)
                    @include('user.products.product', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- new-products section end -->
@endsection
