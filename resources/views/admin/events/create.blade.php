@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Event</h2>
    <a href="/events" class="btn btn-secondary mb-3">← Kembali</a>
    <form action="/events" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Pembicara</label>
            <input type="text" name="pembicara" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Kuota</label>
                <input type="number" name="kuota" class="form-control" value="100" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Harga (0 = Gratis)</label>
                <input type="number" name="harga" class="form-control" value="0">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection