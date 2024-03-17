@extends('layouts.app')

@section('pageTitle', 'Rekap Harian')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Rekap Absensi Tahunan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Tahunan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ayam</td>
                            <td>ayam</td>
                            <td>ayam</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
