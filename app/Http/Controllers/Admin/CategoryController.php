<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategory(){
        $listCategory = Category::all();
        return view('admin.category.list-category')
        ->with([
            'listCategory' => $listCategory
        ]);
    }
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function addPostCategory(Request $request){
        $request->validate([
            'nameCategory' => 'required',
        ],[
            'nameCategory.required' => 'Tên danh mục không được để trống',
        ]);
        $data = [
            'name' => $request->nameCategory,
        ];
        Category::create($data);
        return redirect()->route('admin.categories.listCategory')
        ->with(['message' => 'Thêm mới thành công']);
    }

    public function deleteCategory($category_id){
        $category = Category::find($category_id);
        $category->delete();
        return redirect()->route('admin.categories.listCategory')
        ->with(['message' => 'Xóa thành công']);
    }

    public function updateCategory($category_id){
        $category = Category::find($category_id);
        return view('admin.category.update-category')->with(['category' => $category]);
    }

    public function updatePostCategory($category_id, Request $request){
        $category = Category::find($category_id); 
        $data = [
            'name' => $request->nameCategory,
        ];
    
        $category->update($data);
        return redirect()->route('admin.categories.listCategory')
            ->with(['message' => 'Cập nhật thành công']);
    }
}
