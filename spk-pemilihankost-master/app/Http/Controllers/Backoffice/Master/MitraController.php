<?php

namespace App\Http\Controllers\Backoffice\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'mitra')->orderBy('name')->get();

        return view('mitra.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mitra.create');
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
                'role' => 'mitra',
            ]);

            return redirect()->route('mitra.index')->with('success', 'Berhasil menyimpan data');
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

        return view('mitra.edit', compact('data'));
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

            return redirect()->route('mitra.index')->with('success', 'Berhasil menyimpan data');
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
