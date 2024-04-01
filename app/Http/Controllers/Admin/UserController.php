<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('q');
        $users = User::when($request->filled('q'),function ($query) use ($id){
            $query->where('id',$id);
        })->paginate();
        return view('pages.admin.user.index',[
            'users' => $users
        ]);
    }
}
