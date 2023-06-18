<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\Normalization;
use Illuminate\Http\Request;
use DataTables;

class RecomendationController extends Controller
{
    public function fetchAllKost(Request $request) {

        if ($request->ajax()) {
            
            /*
            Pada query ini mereleasikan pada tabel kost dan juga user
            */ 
            $kosts = Normalization::with(['kost', 'user']);

            // Pada bagian ini untuk mengeksekusi filter
            if ($request->has('jenis_kost') && $request->has('harga') && $request->has('jarak')) {
                $jenisKost = $request->input('jenis_kost');
                $harga = explode(',', $request->input('harga'));
                $jarak = explode(',', $request->input('jarak')) ?? $request->input('jarak');

                // Tambahkan kondisi WHERE untuk filter semuanya
                $kosts->whereHas('kost', function($query) use ($jenisKost, $harga, $jarak){
                    $query->where('jenis_kost', $jenisKost)
                    ->whereBetween('harga', $harga)
                    ->where(function ($query) use ($jarak) {
                        if (count($jarak) === 1) {
                            $query->where('jarak', $jarak[0]);
                        } elseif (count($jarak) === 2) {
                            $query->whereBetween('jarak', $jarak);
                        }
                    });
                });
            }
    
            // Dapatkan semua data yang telah dipilih
            $kosts = $kosts->get();

    
            // Kemudian kita melakukan perulangan dengan map function
            $data = $kosts->map(function ($kost) {
                // Hitung skor SAW
                $totalScore = ($kost->harga * 7) +
                    ($kost->jarak * 8) +
                    ($kost->fasilitas * 4) +
                    ($kost->panjang_lebar_kamar * 3) +
                    ($kost->keamanan * 6) +
                    ($kost->kebersihan * 5) +
                    ($kost->lokasi * 2) +
                    ($kost->daerah_sekitar * 1);
    
                    // Buat kode json
                return [
                    'id' => $kost->id,
                    'nama_kost' => $kost->kost->nama_kost,
                    'jenis_kost' => $kost->kost->jenis_kost,
                    'alamat' => $kost->kost->alamat,
                    'jarak' => $kost->kost->jarak,
                    'harga' => $kost->kost->harga,
                    'panjang_lebar_kamar' => $kost->kost->panjang_lebar_kamar,
                    'keamanan' => $kost->kost->keamanan,
                    'kebersihan' => $kost->kost->kebersihan,
                    'total_score' => $totalScore,
                    'action' => '<button data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary editProduct" data-id="'.$kost->id.'" >Detail</button><a href="https://wa.me/'.$kost->kost->user->no_hp.'" class="btn btn-success">Pesan sekarang</a>',
                ];
            });
    
            // Data yang ditampilkan dengan total tertinggi
            $data = $data->sortByDesc('total_score')->values();

            // Buatkan data berupa json
            return response()->json(['data' => $data]);
        }

        return view('recomendation');
    }
}
