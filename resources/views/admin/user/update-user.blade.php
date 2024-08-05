@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa User
@endsection

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.users.updatePostUser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <button class="btn btn-primary" type="submit">Sửa</button>
        </form>
    </div>
@endsection
