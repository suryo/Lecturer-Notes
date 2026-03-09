<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'id_user',
        'label',
        'nama_penerima',
        'no_hp',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'detail',
        'is_utama',
    ];
}
