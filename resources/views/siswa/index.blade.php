@extends('layouts.app')

@section('pageTitle', 'Siswa')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Seluruh Siswa</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                @include('partials.error')
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('siswa.create') }}" class="btn btn-success pull-right">Tambah Data Baru</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url('siswa.index') }}" method="get">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pencarian data siswa"
                                    name="search">
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                @if ($dataSiswa && count($dataSiswa) > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Phone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSiswa as $siswa)
                                <tr>
                                    <td>{{ $siswa->uid }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->jadwal->first()->nama_kelas ?? '-' }}</td>
                                    <td>{{ $siswa->phone }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td>
                                        <a href="{{ route('siswa.show', ['uid' => $siswa->uid]) }}" title="Detail"
                                            data-toggle='tooltip'><span class='fa fa-eye'></span></a> &nbsp;
                                        <a href="{{ route('siswa.edit', ['uid' => $siswa->uid]) }}" title="Edit"
                                            data-toggle='tooltip'><span class='fa fa-edit'></span></a> &nbsp;
                                        <a href="{{ route('siswa.deleteForm', ['uid' => $siswa->uid]) }}" title="Hapus"
                                            data-toggle='tooltip'><span class='fa fa-trash'></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataSiswa->links('partials.pagination') }}
                @else
                    <p class='lead'><em>Tidak ada catatan yang ditemukan.</em></p>
                @endif
            </div>
        </div>
    </div>
@endsection
