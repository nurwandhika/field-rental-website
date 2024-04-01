<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.admin.auth.login');
    }

    public function login(Request $request)
    {
        $auth = Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($auth){
            return redirect(route('admin::schedule::index'));
        }else{
            return redirect()->route('auth::index')->with('danger','Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('auth::index'))->with('success','Logout Sukses !');

    }
}
