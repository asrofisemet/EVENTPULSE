@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Event</h2>
    <a href="/events" class="btn btn-secondary mb-3">← Kembali</a>
    <form action="/events/{{ $event->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $event->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="judul" class="form-control" value="{{ $event->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $event->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Pembicara</label>
            <input type="text" name="pembicara" class="form-control" value="{{ $event->pembicara }}">
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $event->tanggal }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" value="{{ $event->jam_mulai }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" value="{{ $event->jam_selesai }}">
            </div>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Kuota</label>
                <input type="number" name="kuota" class="form-control" value="{{ $event->kuota }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Harga (0 = Gratis)</label>
                <input type="number" name="harga" class="form-control" value="{{ $event->harga }}">
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection