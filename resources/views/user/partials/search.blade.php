@extends('user.layouts.index')

@section('content')
<div class="container" style="margin-top: 50px">
    <h2 class="text-danger">Kết quả tìm kiếm cho: "{{ request('query') }}"</h2>
    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="product">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}"/>
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->price }}$</p>
                        {{-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
