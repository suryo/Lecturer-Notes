@extends('layouts.app')

@section('title', 'TokoKita - Toko Online Terpercaya #1')

@section('content')
<header class="hero-section rounded-4 mb-5 text-center shadow-lg">
    <div class="row align-items-center">
        <div class="col-lg-6 px-5 py-5 text-lg-start">
            <h1 class="display-3 fw-bold mb-3">Selamat Datang di TokoKita 🛒</h1>
            <p class="lead mb-4">Temukan berbagai produk berkualitas mulai dari Elektronik, Pakaian, hingga Perabot Rumah Tangga dengan harga bersahabat.</p>
            <div class="d-flex gap-2 justify-content-center justify-content-lg-start">
                <a href="{{ route('produk.index') }}" class="btn btn-warning btn-lg rounded-pill shadow-sm px-4">Mulai Belanja</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">Daftar Akun</a>
            </div>
        </div>
        <div class="col-lg-6 py-5 d-none d-lg-block">
            <h1 style="font-size: 10rem;">📦</h1>
        </div>
    </div>
</header>

<section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Produk Unggulan ✨</h2>
        <a href="{{ route('produk.index') }}" class="text-primary fw-bold text-decoration-none small">Lihat Semua →</a>
    </div>
    
    <div class="row g-4">
        @for ($i = 1; $i <= 4; $i++)
        <div class="col-6 col-md-3">
            <div class="card product-card rounded-4 shadow-sm h-100">
                <div class="p-4 text-center">
                    <h1 style="font-size: 5rem;">📱</h1>
                </div>
                <div class="card-body">
                    <span class="badge bg-primary-subtle text-primary rounded-pill small mb-2">Elektronik</span>
                    <h5 class="card-title fw-bold">Smartphone Unggulan</h5>
                    <p class="card-text text-muted small">Deskripsi singkat produk yang sangat menarik perhatian...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary fs-5">Rp 4.200.000</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill w-100 mt-3">Detail Produk</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</section>

<section class="mb-5 bg-white p-5 rounded-4 shadow-sm text-center">
    <h2 class="fw-bold mb-4">Kenapa Belanja di TokoKita?</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <h3 class="display-6">🚚</h3>
            <h5 class="fw-bold">Gratis Ongkir</h5>
            <p class="text-muted small">Nikmati pengiriman gratis ke seluruh wilayah Indonesia tanpa minimal belanja.</p>
        </div>
        <div class="col-md-4">
            <h3 class="display-6">🛡️</h3>
            <h5 class="fw-bold">Produk Original</h5>
            <p class="text-muted small">Kami bekerja sama langsung dengan distributor resmi untuk menjamin keaslian produk.</p>
        </div>
        <div class="col-md-4">
            <h3 class="display-6">⚡</h3>
            <h5 class="fw-bold">Pengiriman Cepat</h5>
            <p class="text-muted small">Pesanan langsung dikirim di hari yang sama sebelum jam operasional berakhir.</p>
        </div>
    </div>
</section>
@endsection
