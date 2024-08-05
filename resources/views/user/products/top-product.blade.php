@extends('user.layouts.index')

@section('title')
    @parent
    Top sản phẩm mới
@endsection

@section('topproduct')
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
                @foreach($products as $product)
                    <div class="col-xs-12">
                        <div class="single-product">
                            <div class="product-img">
                                <div class="pro-type">
                                    <span>new</span>
                                </div>
                                <a href="#">
                                    <img src="{{ asset('tasnm/img/sg-11134201-22120-tkvugc4k6alv47.jpg') }}" alt="{{ $product->name }}" />
                                    <img class="secondary-image" alt="{{ $product->name }}" src="{{ asset('tasnm/img/products/1.jpg') }}">
                                </a>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">{{ $product->name }}</a></h3>
                                <div class="star-price">
                                    <span class="price-left">${{ $product->price }}</span>
                                    <span class="star-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="actions-btn">
                                <a href="#" data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" data-original-title="Quick View"><i class="fa fa-eye"></i></a>
                                <a data-placement="top" data-toggle="tooltip" href="#" data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Compare"><i class="fa fa-retweet"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Add your custom scripts here if needed -->
@endpush
