<?php

namespace App\Http\Controllers;

use App\Models\Normalization;
use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Pada bagian ini adalah untuk mendapatkan request dari selection pada file recomendation.blade.php
         */
        $attr['jenis_kost'] = $request->input('jenis_kost');
        $attr['harga'] = explode(",",$request->input('harga'));
        $attr['jarak'] = explode(",",$request->input('jarak'));

        /**
         *  kemudian disini untuk mengeksekusi filter ketika button telah diklik
         * */  
        $normalization = Normalization::whereHas('kost', function($query) use ($attr) {

            // Pada bagian ini dibuatkan harga mulai dan harga akhir
            $hargaStart = isset($attr['harga'][0]) ? (int)$attr['harga'][0] : '';
            $hargaEnd   = isset($attr['harga'][1]) ? (int)$attr['harga'][1] : '';

            // Pada bagian ini dibuatkan jarak mulai dan jarak akhir
            $jarakStart =  isset($attr['jarak'][0]) ? (int)$attr['jarak'][0] : '';
            $jarakEnd   =  isset($attr['jarak'][1]) ? (int)$attr['jarak'][1] : '';

            // Disini adalah eksekusi query yanng telah dipilih jenis kost, harga dan jarak
            $query->where('jenis_kost', $attr['jenis_kost'])
                    ->whereBetween('harga', [ $hargaStart, $hargaEnd])
                    ->whereBetween('jarak', [ $jarakStart, $jarakEnd]);
        })->get();


        // Pada bagian ini ditampilkan hasil eksequsi dari querey diatas dengan total paling besar diatas
        $rows = $normalization->map(function ($row) {
            $row->user = $row->kost->user;
            $row->total = number_format(($row->harga * 7) + ($row->jarak * 8) + ($row->fasilitas * 4) + ($row->panjang_lebar_kamar * 3) + ($row->keamanan * 6) + ($row->kebersihan * 5) + ($row->lokasi * 2) + ($row->daerah_sekitar * 1), 3, '.', ',');
            return $row;
        })
        ->sortByDesc('total');
        
        // Dan terakhir datanya dilempar ke views recomendation
        return view('recomendation', compact('rows'));
    }

}
