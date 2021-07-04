<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $payload['users'] = User::all();

        return view('page/admin/user/index', $payload);
    }

    public function create()
    {
        $payload['roles'] = Role::all();
        
        return view('page/admin/user/create', $payload);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->nama = $request->input('nama');
        $user->no_telefon = $request->input('no_telefon');
        $user->alamat = $request->input('alamat');
        $user->save();

        return redirect('admin/user')->with('success_message', 'Berhasil menambahkan data user baru');
    }

    public function edit($id)
    {
        $payload['user'] = User::find($id);
        if (!$payload['user']) redirect('admin/user')->with('failed_message', 'Data user tidak ditemukan');
        $payload['roles'] = Role::all();

        return view('page/admin/user/edit', $payload);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) redirect('admin/user')->with('failed_message', 'Data user tidak ditemukan');

        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = $request->input('password') !== null ? Hash::make($request->input('password')) : $user->password;
        $user->role_id = $request->input('role_id');
        $user->nama = $request->input('nama');
        $user->no_telefon = $request->input('no_telefon');
        $user->alamat = $request->input('alamat');
        $user->save();

        return redirect('admin/user')->with('success_message', 'Berhasil mengubah data user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) redirect('admin/user')->with('failed_message', 'Data user tidak ditemukan');
        $user->delete();

        return redirect('admin/user')->with('success_message', 'Berhasil menghapus data user');
    }
}
