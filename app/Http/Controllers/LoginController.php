<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('register.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            //apakah user status = active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active, please contact admin!');

                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }

            // return redirect()->intended('dashboard');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'login Invalid');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function registerProcess(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'phone' => 'max:255',
            'address' => 'required'
        ]);

        Session::flash('status', 'success');
        Session::flash('message', 'Your create account successfull, please contact admin for actived!');

        $user = User::create($request->all());
        return redirect('/register');
    }
}
