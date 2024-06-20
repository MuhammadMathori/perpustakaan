<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::where('status', 'active')->get();
        return view('dashboard.admin.users', [
            'users' => $users
        ]);
    }

    public function userRegistered()
    {
        $usersRegistered = User::where('status', 'inactive')->get();
        return view('dashboard.admin.user-registered', [
            'usersRegistered' => $usersRegistered
        ]);
    }

    public function detailUser($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('dashboard.admin.detail-user', [
            'user' => $user
        ]);
    }

    public function acc($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('users')->with('status', 'User Activated');
    }

    public function ban($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('dashboard.admin.ban-user', [
            'user' => $user
        ]);
    }

    public function banned($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User Banned');
    }

    public function destroy()
    {
        $bannedUser = User::onlyTrashed()->get();
        return view('dashboard.admin.banned-user', [
            'bannedUser' => $bannedUser
        ]);
    }

    public function unban($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Unbanned');
    }
}
