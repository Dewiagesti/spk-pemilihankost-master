<?php

namespace App\Http\Controllers\Mitra;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Services\AlternativeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kostByUserMitra = Kost::where('user_id',Auth::user()->id)->first();
       
        return view('mitra.kost.index', compact('kostByUserMitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('mitra.kost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
        AlternativeService::createAlternativeTable($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json([
            'status' => 200,
            'data' => Kost::find($id),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kost::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Data berhasil dihapus.']);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan.']);
        }
    }
}
