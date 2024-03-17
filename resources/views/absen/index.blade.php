@extends('layouts.app')

@section('pageTitle', 'Absensi')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Harian</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-success pull-right disabled">Tambah Data Absensi</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('absensi.index') }}" method="get">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pencarian data absensi"
                                    name="search">
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                @if ($absens && count($absens) > 0)
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>UID
                                <th>Nama</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absens as $absen)
                                <tr>
                                    <td>{{ $absen->tanggal }}</td>
                                    <td>{{ $absen->uid }}</td>
                                    <td>{{ $absen->nama }}</td>
                                    <td>{{ $absen->jam_masuk }}</td>
                                    <td>{{ $absen->jam_keluar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $absens->links('partials.pagination') }} --}}
                @else
                    <p class='lead'><em>No records were found.</em></p>
                @endif
            </div>
        </div>
    </div>

@endsection
