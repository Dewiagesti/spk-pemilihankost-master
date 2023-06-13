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

            // Pada bagian ini untuk mengeksekusi filter
            if ($request->has('jenis_kost') && $request->has('harga') && $request->has('jarak')) {
                $jenisKost = $request->input('jenis_kost');
                $harga = explode(',', $request->input('harga'));
                $jarak = explode(',', $request->input('jarak'));

                // Tambahkan kondisi WHERE untuk filter semunyanya
                $kosts->where('jenis_kost', $jenisKost)
                        ->whereBetween('harga', $harga)
                        ->whereBetween('jarak', $jarak);
            }

            return DataTables::of($kosts)
            ->addColumn('action', function($row){
                $btn = '<button data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary editProduct" data-id="'.$row->id.'" >Detail</button><a href="https://wa.me/'.$row->phone.'" class="btn btn-success">Pesan sekarang</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('recomendation');
    }
}
