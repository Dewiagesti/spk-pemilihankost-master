<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    
    public function index()
    {
        $kosts = Kost::all();
        return view('admin.kost.index', compact('kosts'));
    }

    public function show($id)
    {
        $kost = Kost::findOrFail($id);

        return view('admin.kost.index', compact('kost'));
    }

}
