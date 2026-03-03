# Pertemuan 5: Blade Templating & Assets Management

## Deskripsi Singkat

Sesi ini membahas **Blade**, mesin templating milik Laravel, dan cara mengelola asset (CSS/JS) menggunakan **Vite**.

## Tujuan Instruksional

1. Mahasiswa memahami sintaks dasar Blade directives.
2. Mahasiswa mampu membuat Master Layout (Inheritance).
3. Mahasiswa mampu menyertakan file CSS/JS via Vite.

## Materi Pembelajaran

### 1. Layout Inheritance (`@extends`)

Memungkinkan kita membuat template induk sehingga tidak perlu duplikasi kode header/footer.

```html
{{-- Master Layout --}} @yield('content') {{-- Child View --}}
@extends('layouts.app') @section('content')
<h1>Konten</h1>
@endsection
```

### 2. Blade Directives

- `@if`, `@foreach`, `@auth`, `@guest`.

### 3. Vite Assets

```html
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

## Praktikum

1. Buat Master Layout `main.blade.php`.
2. Buat halaman Beranda dan Profil yang mewarisi layout tersebut.

## Latihan

Apa perbedaan antara `@yield` dan `@section`?
