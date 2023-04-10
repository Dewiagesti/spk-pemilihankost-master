<?php

namespace App\Http\Controllers\Backoffice\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'admin')->orderBy('name')->get();

        return view('admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
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
                'password' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'unique' => ':attribute telah digunakan.'
            ],
            [
                'nama' => 'Nama',
                'email' => 'Email',
                'password' => 'Password',
            ]
        );

        try {
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'role' => 'admin',
            ]);

            return redirect()->route('admin.index')->with('success', 'Berhasil menyimpan data');
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

        return view('admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $isEmailUnique = $request->email && $request->email != $data->email ? '|unique:users,email' : '';
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email'.$isEmailUnique,
            ],
            [
                'required' => ':attribute harus diisi.',
                'unique' => ':attribute telah digunakan.'
            ],
            [
                'nama' => 'Nama',
                'email' => 'Email',
            ]
        );

        try {
            $data->name = $request->nama;
            $data->email = $request->email;
            if ($data->password)
                $data->password = \Hash::make($request->password);

            $data->save();

            return redirect()->route('admin.index')->with('success', 'Berhasil menyimpan data');
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
