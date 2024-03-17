@extends('layouts.app')

@section('content')
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hapus Data</h6>
            </div>
            <div class="card-body">
                <div class="col-md-12 ">
                    <form action="{{ route('invalid.destroy', $dataInvalid['id']) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="alert alert-danger" role="alert">
                            <p>Apakah anda ingin menghapus data ini?</p>
                            <p>UID : <b>{{ $dataInvalid->uid }}</b> <br>
                                Tanggal : {{ $dataInvalid->tanggal }}<br>
                                Jam Tap : {{ $dataInvalid->waktu }}<br>
                                Status : {{ $dataInvalid->status }}</p><br>
                        </div>
                        <input type="hidden" name="id" value="{{ $dataInvalid->id }}" />
                        <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <input type="submit" value="Ya" class="btn btn-danger btn-sm me-md-2 px-4">
                            <a href="{{ route('invalid.index') }}" class="btn btn-primary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
@endsection
