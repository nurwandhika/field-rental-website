<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $auth = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($auth){
            return redirect(route('schedule'));
        }else{
            return redirect()->route('auth::user-index')->with('danger','Username atau Password salah');
        }
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));

        $request->validate([
            'username' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users'],
        ],[
            'username.unique' => 'Username telah digunakan',
            'phone.unique' => 'Nomor telefon telah digunakan'
        ]);

        $user->save();

        return redirect()->route('auth::user-login')->with('success','Berhasil mendaftar !');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('auth::user-index'))->with('success','Logout Sukses !');
    }
}
