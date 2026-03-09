<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(12);
        return view('products.index', compact('products'));
    }

    public function detail($id)
    {
        $product = Produk::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
