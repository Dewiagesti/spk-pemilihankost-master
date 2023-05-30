<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Normalization;
use Illuminate\Http\Request;
use Normalizer;

class RecomendationController extends Controller
{
    public function index(Request $request)
    {
        $attr['jenis_kost'] = $request->input('jenis_kost');
        $attr['harga'] = explode(",",$request->input('harga'));
        $attr['jarak'] = explode(",",$request->input('jarak'));

        $normalization = Normalization::whereHas('kost', function($query) use ($attr) {

            $hargaStart = isset($attr['harga'][0]) ? (int)$attr['harga'][0] : '';
            $hargaEnd   = isset($attr['harga'][1]) ? (int)$attr['harga'][1] : '';

            $jarakStart =  isset($attr['jarak'][0]) ? (int)$attr['jarak'][0] : '';
            $jarakEnd   =  isset($attr['jarak'][1]) ? (int)$attr['jarak'][1] : '';

            $query->where('jenis_kost', $attr['jenis_kost'])
                    ->whereBetween('harga', [ $hargaStart, $hargaEnd])
                    ->whereBetween('jarak', [ $jarakStart, $jarakEnd]);
        })->get();


        $rows = $normalization->map(function ($row) {
            $row->total = number_format(($row->harga * 7) + ($row->jarak * 8) + ($row->fasilitas * 4) + ($row->panjang_lebar_kamar * 3) + ($row->keamanan * 6) + ($row->kebersihan * 5) + ($row->lokasi * 2) + ($row->daerah_sekitar * 1), 3, '.', ',');
            return $row;
        })
        ->sortByDesc('total');
    

        return view('recomendation', compact('rows'));
    }

}
