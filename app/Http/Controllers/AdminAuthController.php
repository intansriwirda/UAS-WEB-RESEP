<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && $credentials['password'] === $admin->password) {
            Session::put('admin_login', true);
            return redirect('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        // Hapus session login admin
        Session::forget('admin_login');

        // Redirect ke halaman login dengan notifikasi sukses
        return redirect('/admin/login')->with('success', 'Anda berhasil logout.');
    }

}

