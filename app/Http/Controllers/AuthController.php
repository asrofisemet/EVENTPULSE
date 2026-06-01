<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function storeRegister(Request $request)
    {
    DB::table('users')->insert([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nim' => $request->nim,
        'prodi' => $request->prodi,
        'no_hp' => $request->no_hp,
        'foto' => 'default.png',
        'role' => 'mahasiswa',
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/login');
    }

    public function processLogin(Request $request)
    {
    $user = DB::table('users')
        ->where('email', $request->email)
        ->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Password salah');
    }

    Session::put('id', $user->id);
    Session::put('nama', $user->nama);
    Session::put('role', $user->role);

    // Redirect sesuai role
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/dashboard');
    }

    public function logout()
    {
    Session::flush();

    return redirect('/login');
    }
}