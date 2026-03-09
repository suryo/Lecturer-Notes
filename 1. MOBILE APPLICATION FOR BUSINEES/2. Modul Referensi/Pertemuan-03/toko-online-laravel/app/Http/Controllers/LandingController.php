<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class LandingController extends Controller
{
    public function index()
    {
        $products = Produk::where('status', 'aktif')->latest()->take(8)->get();
        return view('home', compact('products'));
    }
}
