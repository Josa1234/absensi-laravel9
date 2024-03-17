@extends('layouts.app')

@section('pageTitle', 'Siswa')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
        <div class="dropdown">
            <div class="btn-group dropstart">
                <button type="button" class="btn bg-secondary-subtle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus text-primary"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button"><a href="{{ route('karyawan.create') }}"
                                class="btn">Buat Data
                            </a></button></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-2">
            <h6 class="m-0 font-weight-bold text-primary">Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                @include('partials.error')
                <div class="col-md-12">
                    @if ($karyawan && count($karyawan) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Phone</th>
                                    <th>Alamat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $row)
                                    <tr>
                                        <td>{{ $row->nip }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->jabatan }}</td>
                                        <td>{{ $row->tempat_lahir }},
                                            {{ date('d-m-Y', strtotime($row->tanggal_lahir)) }}
                                        </td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>
                                            <a href="#" title="Detail" data-toggle='tooltip'><span
                                                    class='fa fa-eye'></span></a>
                                            &nbsp;
                                            <a href="#" title="Edit" data-toggle='tooltip'><span
                                                    class='fa fa-edit'></span></a>
                                            &nbsp;
                                            <a href="#" title="Tambah" data-toggle='tooltip'><span
                                                    class='fa fa-plus'></span></a>
                                            &nbsp;
                                            <a href="#" title="Hapus" data-toggle='tooltip'><span
                                                    class='fa fa-trash'></span></a>
                                        </td>
                                    </tr>
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
            </div>
        </div>
    </div>
@endsection
