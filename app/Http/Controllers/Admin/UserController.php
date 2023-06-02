<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::ofRole(3)->get();
        return view('admin.user.index', compact('users'));
    }

    public function mitra()
    {
        $userRoleMitra = User::ofRole(2)->get();
        return view('admin.mitra.index', compact('userRoleMitra'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.mitra.edit', compact('user'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return back()->with('success', 'Berhasil mengupdate data');
    }

    public function destroy($id)
    {
        $userId = User::findOrFail($id);
        $userId->delete()->with('success', 'Berhasil Menghapus data');

        return back();
    }
}
