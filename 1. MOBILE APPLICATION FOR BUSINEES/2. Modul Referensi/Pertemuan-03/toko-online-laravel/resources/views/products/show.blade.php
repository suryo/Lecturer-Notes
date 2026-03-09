@extends('layouts.app')

@section('title', $product->nama)

@section('content')
<div class="row pt-4 g-5">
    <div class="col-md-5">
        <div class="rounded-5 overflow-hidden shadow-sm bg-light d-flex align-items-center justify-content-center" style="height: 400px; font-size: 8rem">
            📦
        </div>
    </div>
    <div class="col-md-7">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}" class="text-decoration-none">Semua Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page text-truncate">{{ $product->nama }}</li>
            </ol>
        </nav>

        <h1 class="display-6 fw-bold mb-2">{{ $product->nama }}</h1>
        <h2 class="text-primary fw-bold mb-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</h2>

        <div class="mb-4">
            <p class="text-muted small mb-1">📋 Deskripsi Produk</p>
            <p class="fs-6">{{ $product->deskripsi }}</p>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-md-3">
                <label class="form-label small text-muted">Stok Tersedia</label>
                <input type="text" class="form-control text-center bg-light border-0" value="{{ $product->stok }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label small text-muted">Varian</label>
                <select class="form-select border-0 bg-light">
                    <option>Pilih Varian</option>
                </select>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <button class="btn btn-primary w-100 btn-lg rounded-pill shadow-sm py-2">🛒 Tambahkan ke Keranjang</button>
            </div>
        </div>

        <div class="d-flex align-items-center p-3 bg-light rounded-4">
            <div class="me-3 fs-3">🛡️</div>
            <div>
                <p class="fw-bold mb-0">Garansi TokoKu Safe</p>
                <p class="text-muted small mb-0">Proteksi belanja untuk kemanan transaksi Anda.</p>
            </div>
        </div>
    </div>
</div>
@endsection
