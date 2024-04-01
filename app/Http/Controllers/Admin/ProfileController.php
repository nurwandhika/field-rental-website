<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.index',[
            'admin' => auth('admin')->user(),
        ]);
    }

    public function update(Request $request)
    {
        $admin = Admin::find(auth('admin')->user()->id);
        $admin->name = $request->input('name');
        if ($request->input('password') != ''){
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->save();

        return redirect()->route('admin::admin::index');
    }
}
