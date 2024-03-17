@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="{{ route('jadwal.addSiswa', ['jadwal' => $jadwal->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label>Pilih Siswa</label>
                        @foreach ($dataSiswa as $siswa)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="siswa[]" value="{{ $siswa->uid }}">
                                <label class="form-check-label">{{ $siswa->nama }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm me-md-2', 'type' => 'submit']) !!}
                        <a href="{{ route('jadwal.index') }}" class="btn btn-primary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
