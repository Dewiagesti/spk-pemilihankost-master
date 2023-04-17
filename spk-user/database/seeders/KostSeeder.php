<?php

namespace Database\Seeders;

use App\Models\Kost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $kosts = [
            [
                'nama_kost' => 'Bak Yuli',
                'jenis_kost' => 'Putra',
                'alamat' => 'Gang Pabrik',
                'harga' => 350000,
                'fasilitas' => 'Kasur, Lemari, Parkiran, Kamar Mandi Luar',
                'panjang_kamar' => 2.5,
                'lebar_kamar' => 3,
                'keamanan' => 'Cukup Aman',
                'kebersihan' => 'bersih'
            ],
            [
                'nama_kost' => 'Kos Putra',
                'jenis_kost' => 'Putra',
                'alamat' => 'Gang Penjara',
                'harga' => 350000,
                'fasilitas' => 'Kasur,Lemari, Kamar Mandi Luar, Parkiran, Wifi',
                'panjang_kamar' => 2.5,
                'lebar_kamar' => 3,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'bersih'
            ],
            [
                'nama_kost' => 'Kos Annisa',
                'jenis_kost' => 'Putra',
                'alamat' => 'Polres Bondowoso',
                'harga' => 400000,
                'fasilitas' => 'Kasur, Lemari, Parkiran, Kamar Mandi Luar,Wifi, Tempat Cuci Piring',
                'panjang_kamar' => 3,
                'lebar_kamar' => 3,
                'keamanan' => 'Aman',
                'kebersihan' => 'bersih'
            ],
            [
                'nama_kost' => 'Kos Haji Lutfi',
                'jenis_kost' => 'Putri',
                'alamat' => 'Polres Bondowoso',
                'harga' => 500000,
                'fasilitas' => 'Kasur, Lemari, Kipas , Meja Belajar, Wifi, Dapur, Jemuran, Kulkas, Parkiran, Mesih cuci',
                'panjang_kamar' => 3,
                'lebar_kamar' => 3,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'Sangat Bersih'
            ],
            [
                'nama_kost' => 'Kos Busigik',
                'jenis_kost' => 'Putra',
                'alamat' => 'Polres Bondowoso',
                'harga' => 350000,
                'fasilitas' => 'Kasur,Lemari',
                'panjang_kamar' => 2,
                'lebar_kamar' => 3,
                'keamanan' => 'Cukup Aman',
                'kebersihan' => 'Bersih'
            ],
            [
                'nama_kost' => 'Kos Bu Joko',
                'jenis_kost' => 'Putri',
                'alamat' => 'Gang Cinta',
                'harga' => 350000,
                'fasilitas' => 'Kasur, Lemari, Dapur, Wifi, Kamar Mandi Luar',
                'panjang_kamar' => 2.7,
                'lebar_kamar' => 2.7,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'Bersih'
            ],
            [
                'nama_kost' => 'Kos Sakinnah',
                'jenis_kost' => 'Putri',
                'alamat' => 'Gang Cinta',
                'harga' => 325000,
                'fasilitas' => 'Kasur, Lemari, Wifi, Dapur, Kamar mandi luar, Tampat jemuran, Parkiran',
                'panjang_kamar' => 2.5,
                'lebar_kamar' => 3,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'Bersih'
            ],
            [
                'nama_kost' => 'Kos Janur',
                'jenis_kost' => 'Putri',
                'alamat' => 'Dabasah',
                'harga' => 500000,
                'fasilitas' => 'Kasur, Lemari, Wifi, Dapur, Kamar mandi luar, Tampat jemuran, Parkiran,Kipas angin, kulkas',
                'panjang_kamar' => 3,
                'lebar_kamar' => 3,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'Bersih'
            ],
            [
                'nama_kost' => 'Kos Darusalam',
                'jenis_kost' => 'Putri',
                'alamat' => 'Kotakulon',
                'harga' => 350000,
                'fasilitas' => 'Kasur, lemari, Wifi, Kamar mandi luar, Ruang Tamu, Parkiran, Kulkas',
                'panjang_kamar' => 2.5,
                'lebar_kamar' => 2.7,
                'keamanan' => 'Sangat Aman',
                'kebersihan' => 'Bersih'
            ],
            [
                'nama_kost' => 'Kos Salsabila',
                'jenis_kost' => 'Putri',
                'alamat' => 'Kotakulon',
                'harga' => 350000,
                'fasilitas' => 'Kasur,Lemari Kamar mandi dalam, Parkiran, Dapur, Wifi, Tempat Jemuran',
                'panjang_kamar' => 3,
                'lebar_kamar' => 3,
                'keamanan' => 'Aman',
                'kebersihan' => 'Bersih'
            ],

        ];

    public function run(): void
    {
       foreach ($this->kosts as $kost) { Kost::create($kost); }
    }
}
