@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a href="/" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h2 class="fw-bold">{{ $event->judul }}</h2>
            <hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p>📅 <strong>Tanggal:</strong> {{ $event->tanggal }}</p>
                    @if($event->jam_mulai)
                    <p>🕐 <strong>Jam:</strong> {{ $event->jam_mulai }}
                        @if($event->jam_selesai) - {{ $event->jam_selesai }} @endif
                    </p>
                    @endif
                    <p>📍 <strong>Lokasi:</strong> {{ $event->lokasi }}</p>
                </div>
                <div class="col-md-6">
                    @if($event->pembicara)
                    <p>🎤 <strong>Pembicara:</strong> {{ $event->pembicara }}</p>
                    @endif
                    <p>👥 <strong>Kuota:</strong> {{ $event->kuota }}</p>
                    <p>💰 <strong>Harga:</strong>
                        <span class="text-success fw-bold">
                            {{ $event->harga == 0 ? 'Gratis' : 'Rp ' . number_format($event->harga, 0, ',', '.') }}
                        </span>
                    </p>
                </div>
            </div>

            <h5>Deskripsi</h5>
            <p>{{ $event->deskripsi }}</p>

            <hr>
            <form action="/event/{{ $event->id }}/daftar" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-lg w-100">
                    🎟️ Daftar Event Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection