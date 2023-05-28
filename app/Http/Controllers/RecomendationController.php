<?php

namespace App\Http\Controllers;

use App\Models\Normalization;
use App\Services\NormalitationService;
use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index()
    {
        $rows = Normalization::all()
        ->map(function ($row) {
            // $row->kost_id = $row->kost->nama_kost;
            // $row->jenis_kost = $row->kost->jenis_kost;
            // $row->alamat = $row->kost->alamat;
            // $row->jarak = $row->kost->jarak;
            // $row->harga = $row->kost->harga;
            // $row->panjang_lebar_kamar = $row->kost->panjang_lebar_kamar;
            // $row->keamanan = $row->kost->keamanan;
            $row->total = number_format(($row->harga * 7) + ($row->jarak * 8) + ($row->fasilitas * 4) + ($row->panjang_lebar_kamar * 3) + ($row->keamanan * 6) + ($row->kebersihan * 5) + ($row->lokasi * 2) + ($row->daerah_sekitar * 1), 3, '.', ',');
            return $row;
        })->sortByDesc('total');
        
        return view('recomendation', compact('rows'));
    }
}
