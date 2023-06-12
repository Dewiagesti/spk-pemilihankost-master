<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;
use DataTables;

class RecomendationController extends Controller
{
    public function fetchAllKost(Request $request) {
        if ($request->ajax()) {
            $kosts = Kost::select('*');

           
            if ($request->has('jenis_kost') && $request->has('harga') && $request->has('jarak')) {
                $jenisKost = $request->input('jenis_kost');
                $harga = explode(',', $request->input('harga'));
                $jarak = explode(',', $request->input('jarak'));

                // Tambahkan kondisi WHERE untuk filter jarak
                $kosts->where('jenis_kost', $jenisKost)
                        ->whereBetween('harga', $harga)
                        ->whereBetween('jarak', $jarak);
            }

            return DataTables::of($kosts)
            ->make(true);
        }

        return view('recomendation');
    }
}
