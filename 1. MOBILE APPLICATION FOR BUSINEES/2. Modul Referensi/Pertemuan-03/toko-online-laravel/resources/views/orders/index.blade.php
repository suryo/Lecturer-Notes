@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<h2 class="fw-bold mb-4">📦 Pesanan Saya</h2>

<div class="row g-4">
    <div class="col-12">
        <div class="card p-5 rounded-4 border-0 bg-light text-center">
            <h1 style="font-size: 5rem">📄</h1>
            <p class="text-muted">Anda belum memiliki riwayat pesanan.</p>
            <a href="{{ route('product.index') }}" class="btn btn-outline-primary rounded-pill px-4 mx-auto mt-2">Mulai Belanja</a>
        </div>
    </div>
</div>
@endsection
