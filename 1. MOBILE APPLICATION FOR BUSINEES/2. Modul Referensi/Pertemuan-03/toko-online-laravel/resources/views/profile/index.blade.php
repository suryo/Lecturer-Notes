@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-md-6 text-center">
        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 120px; height: 120px; font-size: 4rem">
            👤
        </div>
        <h2 class="fw-bold mb-1">{{ Auth::user()->nama }}</h2>
        <p class="text-muted mb-4">{{ Auth::user()->email }}</p>

        <div class="list-group list-group-flush text-start border rounded-4 overflow-hidden">
            <a href="{{ route('profile.address') }}" class="list-group-item list-group-item-action p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <span>📍 Daftar Alamat</span>
                    <span class="text-muted">›</span>
                </div>
            </a>
            <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <span>📦 Riwayat Pesanan</span>
                    <span class="text-muted">›</span>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action p-3">
                <div class="d-flex justify-content-between align-items-center text-danger">
                    <span>🚪 Keluar</span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
