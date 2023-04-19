<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
