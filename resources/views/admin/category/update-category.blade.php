@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa danh mục
@endsection

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.categories.updatePostCategory', $category->category_id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nameCategory" class="form-label">Tên danh mục:</label>
                <input type="text" class="form-control" name="nameCategory" id="nameCategory" value="{{ $category->name }}">
            </div>
            <button class="btn btn-primary" type="submit">Sửa</button>
        </form>
    </div>
@endsection
