<?php

namespace App\Http\Controllers\Backoffice\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\User;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kost::orderBy('nama_kost')->get();
        // return $data;
        return view('kos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mitra = User::select('id', 'name')->where('role', 'mitra')->orderBy('name')->get();
        $data = Kost::all();
        // return $data;
        return view('kos.create', compact('mitra', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' => 'required',
                'alamat' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'unique' => ':attribute telah digunakan.'
            ],
            [
                'nama' => 'Nama',
                'email' => 'Email',
                'phone' => 'No Handphone',
                'password' => 'Password',
                'alamat' => 'Alamat',
                'longitude' => 'Longitude',
                'latitude' => 'Latitude',
            ]
        );

        try {
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'alamat' => $request->alamat,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'no_hp' => $request->phone,
                'role' => 'kos',
            ])
            if($request->hasFile(gambar_kamar)){
                    $photos = $request->file('gambar_kamar');
                    $filename = date('His').'.'.$photos->getClientOriginalExtention();
                    $path = public_path('img/kos/gambar-kamar');
                    if($photos->move($path,$filename)){
                        $request->gambar_kamar = $filename;
                    }else{
                        return redirect()->back()->withError('Terjadi Kesalahan')
                    }
                };
             


            return redirect()->route('kos.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan');
        }
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
        $data = User::find($id);

        return view('kos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $isEmailUnique = $request->email && $request->email != $data->email ? '|unique:users,email' : '';
        $isPhoneUnique = $request->phone && $request->phone != $data->no_hp ? '|unique:users,no_hp' : '';
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email'.$isEmailUnique,
                'phone' => 'required',
                'password' => 'required',
                'alamat' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'unique' => ':attribute telah digunakan.'
            ],
            [
                'nama' => 'Nama',
                'email' => 'Email',
                'phone' => 'No Handphone',
                'alamat' => 'Alamat',
                'longitude' => 'Longitude',
                'latitude' => 'Latitude',
            ]
        );

        try {
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->no_hp = $request->phone;
            $data->alamat = $request->alamat;
            $data->longitude = $request->longitude;
            $data->latitude = $request->latitude;
            if ($request->password)
                $data->password = \Hash::make($request->password);

            $data->save();

            return redirect()->route('kos.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
            if ($data)
                $data->delete();

            return back()->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
}
