@extends('layouts.app')

@section('pageTitle', 'Jadwal')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
        <div class="dropdown">
            <div class="btn-group dropstart">
                <button type="button" class="btn bg-secondary-subtle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus text-primary"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="dropdown-item" type="button">
                            <a href="{{ route('jadwal.create') }}" class="btn">Buat Jadwal
                            </a></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-2">
            <h6 class="m-0 font-weight-bold text-primary">Seluruh Jadwal</h6>
        </div>
        @include('partials.error')
        <div class="card-body">
            <div class="col-md-12">
                @foreach ($jadwalGrouped as $tanggal => $jadwalHariIni)
                    <div class="col-md-12">
                        @php
                            $tanggalHari = \Carbon\Carbon::parse($tanggal);
                        @endphp
                        <h6>{{ ucfirst($tanggalHari->format('l, d-m-Y')) }}</h6>
                        @if ($jadwalHariIni && count($jadwalHariIni) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Waktu</th>
                                        <th>Materi</th>
                                        <th>Ruang</th>
                                        <th>Instruktur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalGrouped as $week => $jadwalMingguIni)
                                        <tr>
                                            <td colspan="6">{{ $week }}</td>
                                        </tr>
                                        @foreach ($jadwalMingguIni->sortBy([['tanggal_mulai', 'asc'], ['jam_mulai', 'asc']]) as $row)
                                            <tr>
                                                <td>{{ $row['nama_kelas'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row['jam_mulai'])->format('H:i') }}-{{ \Carbon\Carbon::parse($row['jam_selesai'])->format('H:i') }}
                                                </td>
                                                <td>{{ $row['materi']['materi'] }}</td>
                                                <td>{{ $row['ruang'] }}</td>
                                                <td>{{ $row['instruktur'] }}</td>
                                                <td>
                                                    <a href="#" title="Detail" data-toggle='tooltip'><span
                                                            class='fa fa-eye'></span></a>
                                                    &nbsp;
                                                    <a href="{{ route('jadwal.edit', ['id' => $row['id']]) }}"
                                                        title="Edit" data-toggle='tooltip'><span
                                                            class='fa fa-edit'></span></a>
                                                    &nbsp;
                                                    <a href="{{ route('jadwal.showAddSiswaForm', ['jadwal' => $row['id']]) }}"
                                                        title="Tambah Siswa" data-toggle='tooltip'><span
                                                            class='fa fa-plus'></span></a>
                                                    &nbsp;
                                                    <a href="{{ route('jadwal.deleteForm', ['id' => $row['id']]) }}"
                                                        title="Hapus" data-toggle='tooltip'><span
                                                            class='fa fa-trash'></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class='lead'><em>No records were found.</em></p>
                            <script defer>
                                document.getElementById("DelAllBtn").className = "btn btn-danger pull-right disabled";
                            </script>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
