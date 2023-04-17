<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        return view('about', compact('kosts'));
    }
    public function detail($id)
    {
        return response()->json([
            'staus' => true,
            'data'  => Kost::find($id)->toArray(),
            'message' => 'detail show'
        ]);
    }
}
