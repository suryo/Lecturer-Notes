@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 rounded-4 shadow-sm border-0">
            <h3 class="fw-bold mb-4">📝 Daftar Akun Baru</h3>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="0812xxxxxx" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill mb-3 shadow-sm">Buat Akun Sekarang</button>
                
                <div class="text-center">
                    <p class="text-muted small">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Masuk di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
