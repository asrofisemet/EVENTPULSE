<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $events = DB::table('events')->get();

        return view('home', compact('events'));
    }

    public function detail($id)
    {
        $event = DB::table('events')
            ->where('id', $id)
            ->first();

        return view('detail-event', compact('event'));
    }
}