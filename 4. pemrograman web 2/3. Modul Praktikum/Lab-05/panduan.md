# Lab 05: Blade Templating & Master Layout

## Target Capaian

Mahasiswa mampu membuat sistem layouting menggunakan Blade Inheritance.

## Langkah-langkah

### 1. Membuat Master Layout

Buat file `resources/views/layouts/main.blade.php`:

```html
<html>
  <head>
    <title>Situs Saya - @yield('title')</title>
  </head>
  <body>
    <nav><a href="/beranda">Beranda</a> | <a href="/kontak">Kontak</a></nav>
    <hr />
    @yield('content')
  </body>
</html>
```

### 2. Membuat Child View

Buat file `resources/views/kontak.blade.php`:

```html
@extends('layouts.main') @section('title', 'Halaman Kontak') @section('content')
<h2>Hubungi Kami</h2>
<p>Silakan hubungi admin di 08123456789</p>
@endsection
```

## Tantangan Mandiri

Implementasikan **Bootstrap** melalui CDN di file Master Layout agar tampilan navigasi dan konten lebih rapi.
