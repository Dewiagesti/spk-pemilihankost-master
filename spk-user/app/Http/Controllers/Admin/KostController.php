<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    
    public function __invoke()
    {
        $kosts = Kost::all();
        return view('admin.kost.index', compact('kosts'));
    }

}
