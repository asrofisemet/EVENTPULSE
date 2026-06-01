<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        $events = DB::table('events')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
    $categories = DB::table('categories')->get();
    return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
    DB::table('events')->insert([
        'category_id' => $request->category_id,
        'user_id'     => Session::get('id'),
        'judul'       => $request->judul,
        'slug'        => \Illuminate\Support\Str::slug($request->judul),
        'deskripsi'   => $request->deskripsi,
        'pembicara'   => $request->pembicara,
        'tanggal'     => $request->tanggal,
        'jam_mulai'   => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'lokasi'      => $request->lokasi,
        'kuota'       => $request->kuota,
        'harga'       => $request->harga ?? 0,
        'status'      => 'published',
        'created_at'  => now(),
    ]);
    return redirect('/events')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
    DB::table('events')->where('id', $id)->update([
        'category_id' => $request->category_id,
        'judul'       => $request->judul,
        'slug'        => \Illuminate\Support\Str::slug($request->judul),
        'deskripsi'   => $request->deskripsi,
        'pembicara'   => $request->pembicara,
        'tanggal'     => $request->tanggal,
        'jam_mulai'   => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'lokasi'      => $request->lokasi,
        'kuota'       => $request->kuota,
        'harga'       => $request->harga ?? 0,
    ]);
    return redirect('/events')->with('success', 'Event berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('events')->where('id', $id)->delete();
        return redirect('/events')->with('success', 'Event berhasil dihapus!');
    }
}