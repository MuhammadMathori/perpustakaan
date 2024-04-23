<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        // $request->session()->flush();
        return view('profile.index');
    }

    public function users()
    {
        return view('dashboard.admin.users');
    }
}
