<?php

namespace App\Http\Controllers;

use App\Services\NormalitationService;
use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index()
    {
        return view('recomendation');
    }

    public function normalisasi()
    {
        NormalitationService::createNormalitation();
    }
}
