<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Normalization extends Model
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

    public function kost(): HasOne
    {
        return $this->hasOne(Kost::class, 'id', 'kost_id');
    }
}
