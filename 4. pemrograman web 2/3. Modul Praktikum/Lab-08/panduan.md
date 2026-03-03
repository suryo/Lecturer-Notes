# Lab 8: Midterm - Melengkapi Fitur Edit & Delete

## Target Capaian

Mahasiswa mampu melengkapi fitur CRUD dengan menambahkan fungsi Edit (Update) dan Hapus (Delete) data.

## Langkah-langkah

### 1. Fitur Delete

Tambahkan di `ProductController`:

```php
public function destroy($id) {
    \App\Models\Product::destroy($id);
    return redirect('/products')->with('success', 'Barang berhasil dihapus!');
}
```

Di `index.blade.php`, tambahkan tombol hapus dengan Form (karena butuh method DELETE):

```html
<form action="/products/{{ $p->id }}" method="POST">
  @csrf @method('DELETE')
  <button class="btn btn-sm btn-danger">Hapus</button>
</form>
```

### 2. Fitur Edit & Update

Buat method `edit` dan `update` di Controller:

```php
public function edit($id) {
    $product = \App\Models\Product::find($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id) {
    $product = \App\Models\Product::find($id);
    $product->update($request->all());
    return redirect('/products');
}
```

## Tantangan Mandiri

Implementasikan validasi yang sama pada fungsi `update` agar data yang diedit tetap mengikuti aturan minimal karakter dan tipe data yang benar.
