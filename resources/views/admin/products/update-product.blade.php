@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa sản phẩm
@endsection

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.products.updatePostProduct', $product->product_id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="nameProduct" id="nameProduct" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="categoryProduct" class="form-label">Danh mục:</label>
                <select class="form-select" name="categoryProduct" id="categoryProduct">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}" @if($category->category_id == $product->category_id)  selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descriptionProduct" class="form-label">Mô tả:</label>
                <input type="text" class="form-control" name="descriptionProduct" id="descriptionProduct" value="{{ $product->description }}">
            </div>
            <div class="mb-3">
                <label for="priceProduct" class="form-label">Giá sản phẩm:</label>
                <input type="text" class="form-control" name="priceProduct" id="priceProduct" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="imageProduct" class="form-label">Ảnh sản phẩm:</label>
                <div>
                    <img style="width: 100px" src="{{ asset($product->image) }}" alt="Product Image">
                </div>
                <input type="file" name="imageProduct" id="imageProduct" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Sửa</button>
        </form>
    </div>
@endsection
