<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.user.profile.index',[
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        if ($request->input('password') != ''){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('user::transaction');
    }
}
