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

            if ($request->has('jenis_kost')) {
                $jenisKost = $request->input('jenis_kost');
                // $harga = $request->input('harga');

                // Tambahkan kondisi WHERE untuk filter jarak
                $kosts->where('jenis_kost', $jenisKost);
            }

            return DataTables::of($kosts)
            ->make(true);
        }

        return view('recomendation');
    }
}
