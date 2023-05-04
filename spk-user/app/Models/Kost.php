<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'kost';

    protected $fillable = [
        'nama_kost', 
        'jenis_kost', 
        'alamat', 
        'harga',
        'longitude',
        'latitude',
        'fasilitas',
        'mitra',
        'panjang_kamar',
        'lebar_kamar', 
        'keamanan', 
        'kebersihan',
    ];

    /**
     * Get the user associated with the Kost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'mitra', 'local_key');
    }
}
