@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.addProduct') }}" class="btn btn-info">Thêm mới</a>
        {{-- <form method="GET" action="{{ route('admin.products.listProduct') }}" class="mt-3">
            <div class="form-group">
                <label for="category">Chọn danh mục:</label>
                <select id="category" name="category_id" class="form-control">
                    <option value="">Tất cả</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lọc</button>
        </form> --}}
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProduct as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->category ? $value->category->name : 'N/A' }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->price }}</td>
                        <td>
                            <img style="width: 100px" src="{{ asset($value->image) }}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('admin.products.updateProduct', $value->product_id) }}"
                                class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.products.deleteProduct', $value->product_id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')"
                                    class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $listProduct->links('pagination::bootstrap-5') }}
    </div>
@endsection
