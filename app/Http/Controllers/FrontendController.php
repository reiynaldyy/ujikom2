<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    public function category(Category $category)
    {
        $produk = $category->product()->get();
        $kategori = Category::All();
        return view('category', compact('produk','kategori'));
    }

     public function index(Category $index)
    {
        $produk = Product::All();
        $kategori = Category::All();
        return view('category', compact('produk','kategori'));
    }
}
