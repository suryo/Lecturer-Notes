<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('produk')->insert([
            [
                'id_kategori' => 1, 
                'nama' => 'Smartphone X', 
                'deskripsi' => 'Smartphone canggih dengan kamera 108MP.', 
                'harga' => 5000000, 
                'stok' => 20, 
                'berat_gram' => 200, 
                'status' => 'aktif'
            ],
            [
                'id_kategori' => 2, 
                'nama' => 'Kaos Polos', 
                'deskripsi' => 'Kaos katun nyaman dipakai.', 
                'harga' => 75000, 
                'stok' => 100, 
                'berat_gram' => 150, 
                'status' => 'aktif'
            ],
            [
                'id_kategori' => 3, 
                'nama' => 'Bola Basket', 
                'deskripsi' => 'Bola basket standar FIBA.', 
                'harga' => 250000, 
                'stok' => 15, 
                'berat_gram' => 600, 
                'status' => 'aktif'
            ],
        ]);
    }
}
