@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Event</h5>
                    <p class="card-text display-6">{{ $totalEvent }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Peserta</h5>
                    <p class="card-text display-6">{{ $totalPeserta }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <p class="card-text display-6">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a href="/events" class="btn btn-primary">Kelola Event</a>
        <a href="/admin/peserta" class="btn btn-success ms-2">Lihat Peserta</a>
    </div>
</div>
@endsection