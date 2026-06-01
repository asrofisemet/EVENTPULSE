@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 420px;" class="d-flex align-items-center">
    <div class="container text-center text-white py-5">
        <div class="mb-3">
            <span style="background: rgba(167,139,250,0.2); border: 1px solid #a78bfa; border-radius: 50px; padding: 6px 18px; font-size: 0.85rem; color: #a78bfa;">
                ⚡ Platform Event Kampus #1
            </span>
        </div>
        <h1 class="fw-bold mb-3" style="font-size: 3.5rem; letter-spacing: -1px;">
            Temukan <span style="color: #a78bfa;">Event</span> Terbaik<br>di Kampusmu
        </h1>
        <p class="mb-4 fs-5" style="color: #cbd5e1; max-width: 600px; margin: auto;">
            Daftar event seminar, workshop, lomba, dan seni kampus dengan mudah dan cepat.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            @if(!session('id'))
                <a href="/register" class="btn btn-warning btn-lg px-4 fw-bold">
                    <i class="bi bi-person-plus"></i> Daftar Gratis
                </a>
                <a href="/login" class="btn btn-outline-light btn-lg px-4">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
            @else
                <a href="/dashboard" class="btn btn-warning btn-lg px-4 fw-bold">
                    <i class="bi bi-grid"></i> Dashboard Saya
                </a>
            @endif
        </div>
        <div class="row mt-5 justify-content-center g-3">
            <div class="col-auto">
                <div style="background: rgba(255,255,255,0.08); border-radius: 12px; padding: 16px 30px;">
                    <div class="fw-bold fs-4">{{ $events->count() }}</div>
                    <div style="color: #94a3b8; font-size: 0.85rem;">Event Tersedia</div>
                </div>
            </div>
            <div class="col-auto">
                <div style="background: rgba(255,255,255,0.08); border-radius: 12px; padding: 16px 30px;">
                    <div class="fw-bold fs-4">100%</div>
                    <div style="color: #94a3b8; font-size: 0.85rem;">Gratis Mendaftar</div>
                </div>
            </div>
            <div class="col-auto">
                <div style="background: rgba(255,255,255,0.08); border-radius: 12px; padding: 16px 30px;">
                    <div class="fw-bold fs-4">⚡ Fast</div>
                    <div style="color: #94a3b8; font-size: 0.85rem;">Proses Instan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event List -->
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">📅 Event Tersedia</h3>
            <p class="text-muted mb-0">Pilih event yang kamu minati dan daftar sekarang</p>
        </div>
    </div>

    <div class="row g-4">
        @php
        $keywords = [
            1 => 'artificial+intelligence+technology',
            2 => 'ui+ux+design',
            3 => 'hackathon+coding',
            4 => 'art+culture+performance',
            5 => 'web+programming+laptop',
        ];
        $defaultKeyword = 'event+campus+seminar';
        @endphp

        @forelse($events as $event)
        @php
            $keyword = $keywords[$event->id] ?? $defaultKeyword;
            $imgUrl = "https://source.unsplash.com/600x300/?" . $keyword . "&sig=" . $event->id;
        @endphp
        <div class="col-md-4">
            <div class="card h-100 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                <!-- Banner Image -->
                <div style="height: 180px; overflow: hidden; position: relative;">
                    <img src="{{ $imgUrl }}"
                         alt="{{ $event->judul }}"
                         style="width: 100%; height: 100%; object-fit: cover;"
                         onerror="this.src='https://picsum.photos/seed/{{ $event->id }}/600/300'">
                    <div style="position: absolute; top: 10px; right: 10px;">
                        <span class="badge {{ $event->harga == 0 ? 'bg-success' : 'bg-warning text-dark' }}" style="border-radius: 8px; padding: 6px 12px; font-size: 0.85rem;">
                            {{ $event->harga == 0 ? '🎉 Gratis' : 'Rp ' . number_format($event->harga, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <span class="badge mb-2" style="background: #ede9fe; color: #6366f1; font-size: 0.8rem; padding: 6px 12px; border-radius: 8px;">
                        📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                    </span>
                    <h5 class="fw-bold mb-3">{{ $event->judul }}</h5>
                    <div class="d-flex flex-column gap-1 mb-3" style="font-size: 0.9rem; color: #64748b;">
                        <span><i class="bi bi-geo-alt-fill text-danger"></i> {{ $event->lokasi }}</span>
                        @if($event->jam_mulai)
                        <span><i class="bi bi-clock-fill text-primary"></i> {{ $event->jam_mulai }}{{ $event->jam_selesai ? ' - ' . $event->jam_selesai : '' }}</span>
                        @endif
                        @if($event->pembicara)
                        <span><i class="bi bi-mic-fill text-warning"></i> {{ $event->pembicara }}</span>
                        @endif
                        <span><i class="bi bi-people-fill text-success"></i> Kuota: {{ $event->kuota }}</span>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <a href="/event/{{ $event->id }}" class="btn w-100 fw-bold" style="background: linear-gradient(135deg, #6366f1, #a78bfa); color: white; border-radius: 10px;">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-calendar-x" style="font-size: 4rem; color: #cbd5e1;"></i>
            <p class="text-muted mt-3 fs-5">Belum ada event tersedia saat ini.</p>
        </div>
        @endforelse
    </div>
</div>

@endsection