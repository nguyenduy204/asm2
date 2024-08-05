<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email chưa được đăng kí',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự'
        ]);
        $dataUserLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($dataUserLogin)) {
            if (Auth::user()->role == '1') {
                return redirect()->route('admin.products.listProduct')
                    ->with(['message' => 'Dang nhap thanh cong']);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with(['message' => 'Email hoac password khong dung']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')
            ->with(['message' => 'Dang xuat thanh cong']);
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ],[
            'name.required' => 'Tên không được để trống',
            'name.alpha' => 'Tên không được chưa chữ số và kí tự đặc biệt',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự'
        ]);
        $check = User::where('email', $request->email)->exists();
        if ($check) {
            return redirect()->route('register')
                ->with(['message' => 'Email da ton tai']);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $newUser = User::create($data);
            // Auth::login($newUser); //Tu dong dang nhap
            return redirect()->route('login')
                ->with(['message' => 'Dang ky thanh cong']);
        }
    }
}
