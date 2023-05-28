<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'boarding_houses';

    protected $fillable = [
        'user_id',
        'nama_kost', 
        'jenis_kost',
        'jarak', 
        'alamat', 
        'harga',
        'longitude',
        'latitude',
        'fasilitas',
        'mitra',
        'panjang_lebar_kamar', 
        'keamanan', 
        'kebersihan',
        'lokasi',
        'daerah_sekitar',
        'gambar_kamar',
        'gambar_kamar_mandi',
        'gambar_tampak_depan'
    ];

    /**
     * Get the user associated with the Kost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
