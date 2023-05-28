<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Normalization;
use Illuminate\Http\Request;

class RangkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $rows = Normalization::all()
        ->map(function ($row) {
            $row->total = number_format($row->harga + $row->jarak + $row->fasilitas + $row->panjang_lebar_kamar + $row->keamanan + $row->kebersihan + $row->lokasi + $row->daerah_sekitar, 3, '.', ',');
            return $row;
        })->sortByDesc('total');

        return response()->json($rows);  
    }
}