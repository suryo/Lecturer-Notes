# Lab 10: Eloquent Relationships (1:N)

## Target Capaian

Mahasiswa mampu menghubungkan dua tabel (Kategori dan Produk).

## Langkah-langkah

1. Di Model `Category`, tambahkan:

```php
public function products() {
    return $this->hasMany(Product::class);
}
```

2. Di Model `Product`, tambahkan:

```php
public function category() {
    return $this->belongsTo(Category::class);
}
```

## Tantangan Mandiri

Tampilkan nama kategori pada tabel daftar produk di View menggunakan `$product->category->name`.
