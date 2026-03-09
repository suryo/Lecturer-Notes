@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 rounded-4">
            <h3 class="fw-bold mb-4">🔐 Masuk</h3>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill mb-3">Masuk Sekarang</button>
                <div class="text-center">
                    <p class="text-muted small">Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Daftar di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
