@extends('admin.layouts.default')

@section('title')
    @parent
    Thêm danh mục
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
        <form action="{{route('admin.categories.addPostCategory')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="" class="form-lable">Tên danh mục:</label>
            <input type="text" class="form-control" name="nameCategory" id="">
            @error('nameCategory')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
        </form>
    </div>
@endsection