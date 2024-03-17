@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Siswa
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rowcount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Absensi Hari ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahAbsensi }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 mr-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kartu Invalid
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $invalid }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-stop-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Hari Ini</h1>
    </div> --}}

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($jadwalList as $jadwal)
            <div class="col mb-4">
                <div class="card h-40">
                    <img src="{{ asset($jadwal->materi->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jadwal->materi->materi }}</h5>
                        <p class="card-text">Waktu : {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Dwiky</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
