<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        $admins = Admin::where('role','admin')->paginate();

        return view('pages.admin.admin.index',[
            'admins' => $admins,
        ]);
    }

    public function create()
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        $admin = new Admin();
        return view('pages.admin.admin.form',[
            'admin' => $admin,
        ]);
    }

    public function store(Request $request)
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        $admin = new Admin();

        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = Hash::make($request->input('password'));
        $admin->role = 'admin';
        $admin->save();

        return redirect()->route('admin::admin::index');
    }

    public function edit(Admin $admin)
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        return view('pages.admin.admin.form',[
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return redirect()->route('admin::admin::index');
    }

    public function destroy()
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
    }
}
