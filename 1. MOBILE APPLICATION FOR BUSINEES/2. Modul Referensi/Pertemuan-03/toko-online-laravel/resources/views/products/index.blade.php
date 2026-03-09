@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<div class="row align-items-end mb-4">
    <div class="col-md-6">
        <h2 class="fw-bold mb-0">📦 Koleksi Produk</h2>
        <p class="text-muted">Temukan berbagai kebutuhan bisnis Anda di sini.</p>
    </div>
    <div class="col-md-6 text-md-end">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                Urutkan Berdasarkan
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                <li><a class="dropdown-item" href="#">Harga Terendah</a></li>
                <li><a class="dropdown-item" href="#">Harga Tertinggi</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row g-4">
    @forelse ($products as $p)
    <div class="col-md-3">
        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; font-size: 3rem">
                📦
            </div>
            <div class="card-body">
                <h6 class="card-title fw-bold mb-1 text-truncate">{{ $p->nama }}</h6>
                <p class="text-primary fw-bold mb-3">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('product.detail', $p->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Detail</a>
                    <button class="btn btn-primary btn-sm rounded-pill">🛒 Tambah</button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <p class="text-muted">Produk masih kosong.</p>
    </div>
    @endforelse
</div>

<div class="mt-5 d-flex justify-content-center">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection
