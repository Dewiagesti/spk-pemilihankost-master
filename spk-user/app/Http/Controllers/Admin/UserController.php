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
}
