@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="row pt-4 g-5">
    <div class="col-md-8">
        <h2 class="fw-bold mb-4">🛒 Keranjang Belanja</h2>
        <div class="card p-4 rounded-4 bg-light border-0 py-5 text-center">
            <h1 style="font-size: 5rem">💨</h1>
            <p class="text-muted">Keranjang Anda masih kosong. Mari mulai berbelanja!</p>
            <a href="{{ route('product.index') }}" class="btn btn-primary rounded-pill px-4 mx-auto mt-3">Cari Produk</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 rounded-4">
            <h5 class="fw-bold mb-4">💰 Ringkasan Belanja</h5>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Subtotal (0 Barang)</span>
                <span>Rp 0</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-4">
                <span class="fw-bold fs-5">Total</span>
                <span class="fw-bold fs-5 text-primary">Rp 0</span>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg rounded-pill w-100 disabled">Lanjut ke Checkout</a>
        </div>
    </div>
</div>
@endsection
