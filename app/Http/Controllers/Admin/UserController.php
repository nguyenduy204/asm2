<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function listUser(){
        $listUser = User::paginate(10);
        return view('admin.user.list-user')
        ->with([
            'listUser' => $listUser
        ]);
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.listUser')
        ->with(['message' => 'Xóa thành công']);
    }

    public function updateUser($id){
        $user = User::find($id);
        return view('admin.user.update-user')->with(['user' => $user]);
    }

    public function updatePostUser($id, Request $request){
        $user = User::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        $user->update($data);
        return redirect()->route('admin.users.listUser')
            ->with(['message' => 'Cập nhật thành công']);
    }
}
