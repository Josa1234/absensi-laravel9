@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rekap Absensi</h2>

    <div class="mb-3">
        <a href="#" class="btn btn-primary">Harian</a>
        <a href="#" class="btn btn-primary">Mingguan</a>
        <a href="#" class="btn btn-primary">Bulanan</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Hadir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->nama_karyawan }}</td>
                    <td>{{ $absensi->hadir ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
