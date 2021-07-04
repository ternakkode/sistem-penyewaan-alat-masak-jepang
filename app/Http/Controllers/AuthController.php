<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView() {
        return view('page/auth/register');
    }

    public function registerProcess(Request $request) {
        $user = new User();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 2;
        $user->nama = $request->input('nama');
        $user->no_telefon = $request->input('no_telefon');
        $user->alamat = $request->input('alamat');
        $user->save();

        return redirect('login')->with('success_message', 'Telah berhasil registrasi, silahkan login');
    }

    public function loginView() {
        
        return view('page/auth/login');
    }

    public function loginProcess(Request $request) {
        if (!auth()->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) {
            return redirect('login')->with('failed_message', 'Akun anda tidak sesuai');
        }

        $roleName = auth()->user()->role->nama;
        if ($roleName == 'Admin') {
            return redirect('/admin')->with('success_message', 'Telah berhasil login');
        }

        return redirect('/')->with('success_message', 'Telah berhasil login');
    }

    public function logoutProcess(Request $request) {
        auth()->logout();

        return redirect('login');
    }
}
