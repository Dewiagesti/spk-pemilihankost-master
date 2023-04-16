<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index()
    {
        return view('recomendation');
    }
}
