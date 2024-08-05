<div class="col-xs-12">
    <div class="single-product">
        <div class="product-img">
            <div class="pro-type">
                <span>new</span>
            </div>
            <a href="#">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" />
                <img class="secondary-image" alt="{{ $product->name }}" src="{{ $product->image }}">
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
