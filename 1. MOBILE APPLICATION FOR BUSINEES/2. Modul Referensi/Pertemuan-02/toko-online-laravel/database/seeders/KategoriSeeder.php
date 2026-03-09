<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('kategori')->insert([
            ['nama' => 'Elektronik', 'ikon_url' => 'elektronik.png', 'parent_id' => null],
            ['nama' => 'Pakaian', 'ikon_url' => 'pakaian.png', 'parent_id' => null],
            ['nama' => 'Olahraga', 'ikon_url' => 'olahraga.png', 'parent_id' => null],
            ['nama' => 'Buku', 'ikon_url' => 'buku.png', 'parent_id' => null],
        ]);
    }
}
