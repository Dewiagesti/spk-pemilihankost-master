<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Normalization;
use Illuminate\Http\Request;

class NormalizationController extends Controller
{
    public function index()
    {
        $normalizations = Normalization::all();
        return view('mitra.normalization.index', compact('normalizations'));
    }
}
