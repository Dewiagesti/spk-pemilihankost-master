<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FileUpload
{

    public static function uploadFile($request, $path)
    {
        $imageName = time().'.'.$request->getClientOriginalExtension();
        $dir = $request->storeAs(Str::slug(Auth::user()->name).$path, $imageName);
        return $dir;
    }

    public static function uploadPhoto($request, $name)
    {
        $imageName = Str::slug(Str::lower($name))."-".time().'.'.$request->getClientOriginalExtension();
        $dir = $request->storeAs('profile', $imageName);
        return $dir;
    }

}
