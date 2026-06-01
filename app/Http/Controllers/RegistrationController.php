<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    public function store($id)
    {
        $user_id = Session::get('id');

        if (!$user_id) {
            return redirect('/login');
        }

        // Cek apakah sudah pernah daftar
        $cek = DB::table('registrations')
            ->where('event_id', $id)
            ->where('user_id', $user_id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Anda sudah terdaftar pada event ini');
        }

        // Nomor antrian
        $antrian = DB::table('registrations')
            ->where('event_id', $id)
            ->count() + 1;

        // Kode tiket
        $kode_tiket = 'EP-' . rand(1000,9999) . '-' . rand(1000,9999);

        DB::table('registrations')->insert([
            'event_id' => $id,
            'user_id' => $user_id,
            'kode_tiket' => $kode_tiket,
            'nomor_antrian' => $antrian,
            'status' => 'terdaftar',
            'created_at' => now()
        ]);

        return redirect('/dashboard');
    }
}