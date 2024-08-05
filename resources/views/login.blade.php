<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4>Đăng nhập</h4>
        @if (session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
        <form action="{{route('postLogin')}}" method="POST">
            @csrf
            <label class="form-lable" for="">Email:</label>
            <input type="email" name="email" class="form-control" id="">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <label class="form-lable" for="">Password:</label>
            <input type="password" name="password" class="form-control" id="">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
            <button class="btn btn-primary">Đăng nhập</button>
            <a class="btn btn-success" href="{{route('register')}}">Đăng ký</a>
        </form>

    </div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>