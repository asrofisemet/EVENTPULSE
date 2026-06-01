<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Session::get('id');

        $tiket = DB::table('registrations')
            ->join('events', 'registrations.event_id', '=', 'events.id')
            ->where('registrations.user_id', $user_id)
            ->select(
                'events.judul',
                'events.tanggal',
                'events.lokasi',
                'registrations.kode_tiket',
                'registrations.nomor_antrian'
            )
            ->get();

        return view('mahasiswa.dashboard', compact('tiket'));
    }

    public function adminIndex()
{
    $totalEvent = DB::table('events')->count();
    $totalPeserta = DB::table('registrations')->count();
    $totalUser = DB::table('users')->count();
    return view('admin.dashboard', compact('totalEvent', 'totalPeserta', 'totalUser'));
}

public function peserta()
    {
    $peserta = DB::table('registrations')
        ->join('events', 'registrations.event_id', '=', 'events.id')
        ->join('users', 'registrations.user_id', '=', 'users.id')
        ->select(
            'users.name',
            'users.email',
            'events.judul',
            'registrations.kode_tiket',
            'registrations.nomor_antrian',
            'registrations.status'
        )
        ->get();
    return view('admin.peserta', compact('peserta'));
    }
}