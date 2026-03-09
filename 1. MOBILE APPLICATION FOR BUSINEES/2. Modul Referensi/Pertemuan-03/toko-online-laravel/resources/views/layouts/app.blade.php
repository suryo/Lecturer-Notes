<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoKu — @yield('title', 'Toko Online')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .main-content { min-height: 80vh; padding: 2rem 0; }
        .footer { background-color: #343a40; color: #fff; padding: 2rem 0; }
        .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05); transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">🛒 TokoKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">📦 Produk</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-primary position-relative me-3">
                            🛒 Keranjang
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->nama }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">👤 Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('order.index') }}">📦 Pesanan</a></li>
                                @can('admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">🛠️ Dashboard Admin</a></li>
                                @endcan
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">🚪 Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        @yield('content')
    </div>

    <footer class="footer mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2026 TokoKu — Marketplace Platform for Mobile Business Course.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
