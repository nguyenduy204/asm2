@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách danh mục
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách danh mục</h4>
        <a href="{{ route('admin.categories.addCategory') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCategory as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.updateCategory', $value->category_id) }}"
                                class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.categories.deleteCategory', $value->category_id) }}" method="POST">
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
        {{-- {{ $listCategory->links('pagination::bootstrap-5') }} --}}
    </div>
@endsection
