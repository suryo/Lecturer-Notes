@extends('layouts.app')

@section('title', 'Marketplace Terpercaya')

@section('content')
<div class="row align-items-center mb-5 p-5 bg-primary text-white rounded-4">
    <div class="col-md-6">
        <h1 class="display-4 fw-bold">Belanja Kapan Pun, Di Mana Pun</h1>
        <p class="lead">Selamat datang di TokoKu, platform demo untuk praktikum Mobile Application for Business.</p>
        <a href="{{ route('product.index') }}" class="btn btn-light btn-lg text-primary fw-bold mt-3 px-4">Lihat Produk</a>
    </div>
    <div class="col-md-6 text-center">
        <h1 style="font-size: 8rem">🛒</h1>
    </div>
</div>

<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h3 class="fw-bold mb-0">📦 Produk Terpopuler</h3>
        <p class="text-muted small">Pilihan terbaik untuk bisnis Anda hari ini.</p>
    </div>
    <a href="{{ route('product.index') }}" class="text-primary fw-bold text-decoration-none small">Lihat Semua →</a>
</div>

<div class="row g-4">
    @forelse ($products as $p)
    <div class="col-md-3">
        <div class="card h-100 border-0 rounded-4 overflow-hidden">
            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; font-size: 3rem">
                📦
            </div>
            <div class="card-body">
                <h6 class="card-title fw-bold mb-1">{{ $p->nama }}</h6>
                <p class="text-primary fw-bold mb-3">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('product.detail', $p->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Detail</a>
                    <button class="btn btn-primary btn-sm rounded-pill">🛒 Tambah</button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col text-center py-5">
        <p class="text-muted">Belum ada produk yang tersedia.</p>
    </div>
    @endforelse
</div>
@endsection
