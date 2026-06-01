@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Peserta</h2>
    <a href="/admin/dashboard" class="btn btn-secondary mb-3">← Kembali</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Event</th>
                <th>Kode Tiket</th>
                <th>No Antrian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peserta as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kode_tiket }}</td>
                <td>{{ $p->nomor_antrian }}</td>
                <td>{{ $p->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection