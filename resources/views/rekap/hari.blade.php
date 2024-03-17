@extends('layouts.app')

@section('pageTitle', 'Rekap Harian')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Rekap Absensi Harian</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Harian</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('rekap.hari') }}" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    {{-- <label for="searchDate">Pilih Tanggal:</label> --}}
                                    <input type="date" class="form-control" name="searchDate" value="{{ old('searchDate') }}">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>UID</th>
                            <th>Nama</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $index => $absen)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $absen->uid }}</td>
                                <td>{{ $absen->nama }}</td>
                                <td>{{ $absen->jam_masuk }}</td>
                                <td>{{ $absen->jam_keluar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
