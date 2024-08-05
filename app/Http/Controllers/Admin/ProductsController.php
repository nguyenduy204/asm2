<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function listProduct(){
        $listProduct = Product::with('category')->paginate(10);
        return view('admin.products.list-product')
        ->with([
            'listProduct' => $listProduct
        ]);
    }
    public function addProduct(){
        $categories = Category::all();
        return view('admin.products.add-product', compact('categories'));
    }

    public function addPostProduct(Request $request){
        $request->validate([
            'nameProduct' => 'required',
            'descriptionProduct' => 'required',
            'priceProduct' => 'required|numeric',
        ],[
            'nameProduct.required' => 'Tên sản phẩm không được để trống',
            'descriptionProduct.required' => 'Mô tả sản phẩm không được để trống',
            'priceProduct.required' => 'Giá sản phẩm không được để trống',
            'priceProduct.numeric' => 'Giá sản phẩm phải là chữ số',
        ]);
        $linkImage = null;
        if($request->hasFile('imageProduct')){
            $image = $request->file('imageProduct');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('image/'), $newName);
            $linkImage = 'image/' . $newName;
        }
        $data = [
            'name' => $request->nameProduct,
            'category_id' => $request->categoryProduct,
            'description' => $request->descriptionProduct,
            'price' => $request->priceProduct,
            'image' => $linkImage
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProduct')
        ->with(['message' => 'Thêm mới thành công']);
    }

    public function deleteProduct($product_id){
        $product = Product::find($product_id);
        if($product->image != null){
            File::delete(public_path($product->image));
        };
        $product->delete();
        return redirect()->route('admin.products.listProduct')
        ->with(['message' => 'Xóa thành công']);
    }

    public function updateProduct($product_id){
        $product = Product::find($product_id);
        $categories = Category::all();
        return view('admin.products.update-product')->with(['product' => $product, 'categories' => $categories]);
    }

    public function updatePostProduct($product_id, Request $request){
        $product = Product::find($product_id);

        $linkImage = $product->image;
        if($request->hasFile('imageProduct')){
            if($linkImage != null){
                File::delete(public_path($linkImage));
            }
            $image = $request->file('imageProduct');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('image/'), $newName);
            $linkImage = 'image/' . $newName;
        }
    
        $data = [
            'name' => $request->nameProduct,
            'category_id' => $request->categoryProduct,
            'description' => $request->descriptionProduct,
            'price' => $request->priceProduct,
            'image' => $linkImage
        ];
    
        $product->update($data);
        return redirect()->route('admin.products.listProduct')
            ->with(['message' => 'Cập nhật thành công']);
    }
}
