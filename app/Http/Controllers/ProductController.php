<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();
        $newProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::all();

        return view('user.products.home', compact('allProducts', 'newProducts', 'categories'));
    }

    public function filterByCategory($category_id)
    {
        $categories = Category::all();
        $allProducts = Product::where('category_id', $category_id)->get();
        $newProducts = Product::orderBy('created_at', 'desc')->take(10)->get();

        return view('user.products.home', compact('allProducts', 'newProducts', 'categories'));
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")->get();
        
        return view('user.partials.search', ['products' => $products, 'categories' => $categories]);
    }
}

