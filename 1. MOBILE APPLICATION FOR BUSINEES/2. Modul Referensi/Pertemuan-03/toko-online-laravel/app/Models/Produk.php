<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id_kategori',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'berat_gram',
        'terjual',
        'rating',
        'status',
    ];
}
