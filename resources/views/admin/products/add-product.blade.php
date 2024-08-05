@extends('admin.layouts.default')

@section('title')
    @parent
    Thêm sản phẩm
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
        <form action="{{route('admin.products.addPostProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="" class="form-lable">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="nameProduct" id="">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <label for="" class="form-lable">Danh mục:</label>
            <select class="form-select" name="categoryProduct" id="categoryProduct">
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
            <label for="" class="form-lable">Mô tả:</label>
            <input type="text" class="form-control" name="descriptionProduct" id="">
            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <label for="" class="form-lable">Giá sản phẩm:</label>
            <input type="text" class="form-control" name="priceProduct" id="">
            @error('price')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <label for="imageProduct">Ảnh sản phẩm:</label>
            <input type="file" name="imageProduct" id="imageProduct" class="form-control"><br>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
        </form>
    </div>
@endsection