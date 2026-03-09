@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h2 class="fw-bold mb-4">🛠️ Dashboard Admin</h2>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card p-3 rounded-4 bg-primary text-white border-0 shadow-sm">
            <h6 class="mb-1 small">Total Penjualan</h6>
            <h3 class="fw-bold mb-0">Rp 0</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 rounded-4 bg-success text-white border-0 shadow-sm">
            <h6 class="mb-1 small">Total Pesanan</h6>
            <h3 class="fw-bold mb-0">0</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 rounded-4 bg-info text-white border-0 shadow-sm">
            <h6 class="mb-1 small">Total Produk</h6>
            <h3 class="fw-bold mb-0">3</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 rounded-4 bg-warning text-white border-0 shadow-sm">
            <h6 class="mb-1 small">Total Member</h6>
            <h3 class="fw-bold mb-0">2</h3>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-12">
        <div class="card p-4 rounded-4 border-0 shadow-sm">
            <h5 class="fw-bold mb-3">Pesanan Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="4" class="text-center py-4 text-muted small">Belum ada data pesanan terbaru.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
