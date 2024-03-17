@extends('layouts.app')

@section('pageTitle', 'Rekap Harian')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Rekap Absensi Bulanan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Bulanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2" class="align-middle">No</th>
                            <th rowspan="2" class="align-middle">Nama</th>
                            <th colspan="32">Bulan</th>
                            <th rowspan="2" class="align-middle">Jumlah Kehadiran</th>
                        </tr>
                        <tr class="text-center">
                            @for ($i = 1; $i < 31; $i++)
                                <th>{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ayam</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
