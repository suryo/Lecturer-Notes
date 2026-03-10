@extends('layouts.app')

@section('title', 'Katalog Produk - TokoKita')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Katalog Produk</li>
  </ol>
</nav>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card p-3 rounded-4 shadow-sm h-100 border-0">
            <h5 class="fw-bold mb-3">Filter Kategori 🏷️</h5>
            <ul class="list-group list-group-flush small">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Elektronik 💻
                    <span class="badge bg-primary rounded-pill">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pakaian 👕
                    <span class="badge bg-primary rounded-pill">25</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                    Buku 📚
                </li>
            </ul>

            <h5 class="fw-bold mt-4 mb-3">Rentang Harga 💰</h5>
            <div class="mb-3">
                <input type="range" class="form-range" min="0" max="10000000" id="customRange2">
                <div class="d-flex justify-content-between small text-muted">
                    <span>Rp 0</span>
                    <span>Rp 10jt+</span>
                </div>
            </div>
            
            <button class="btn btn-primary btn-sm rounded-pill w-100 mt-2 shadow-sm">Terapkan Filter</button>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0">Produk Pilihan 🔥</h3>
            <div class="d-flex gap-2">
                <select class="form-select form-select-sm rounded-pill shadow-sm">
                    <option selected>Terbaru</option>
                    <option value="1">Harga Terendah</option>
                    <option value="2">Harga Tertinggi</option>
                </select>
            </div>
        </div>
        
        <div class="row g-3">
            @for ($i = 1; $i <= 8; $i++)
            <div class="col-6 col-md-4">
                <div class="card product-card rounded-4 shadow-sm border-0">
                    <div class="p-3 text-center">
                        <h1 style="font-size: 4rem;">📦</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Nama Produk Dummy #{{ $i }}</h5>
                        <p class="card-text text-muted small">Produk berkualitas tinggi di TokoKita...</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold text-primary">Rp 150.000</span>
                        </div>
                        <a href="{{ route('produk.detail', ['id' => $i]) }}" class="btn btn-outline-primary btn-sm rounded-pill w-100 shadow-sm">Detail</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <nav class="mt-5">
          <ul class="pagination pagination-sm justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
          </ul>
        </nav>
    </div>
</div>
@endsection
