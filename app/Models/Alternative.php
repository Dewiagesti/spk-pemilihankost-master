<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = [
        'kost_id',
        'harga',
        'jarak',
        'fasilitas',
        'lokasi',
        'panjang_lebar_kamar', 
        'keamanan', 
        'kebersihan',
        'daerah_sekitar'
    ];
}
