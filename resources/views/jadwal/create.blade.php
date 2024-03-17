@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! Form::open(['route' => 'jadwal.store', 'method' => 'post']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('kelas', 'Nama Kelas', ['class' => 'form-label']) !!}
                    {!! Form::text('kelas', old('kelas'), [
                        'class' => 'form-control' . ($errors->has('kelas') ? ' is-invalid' : ''),
                        'id' => 'kelas',
                        'required',
                    ]) !!}
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('materi', 'Materi', ['class' => 'form-label']) !!}
                    {!! Form::select('materi', $dataMateri, old('materi'), [
                        'class' => 'form-control',
                        'placeholder' => 'Pilih Materi',
                        'required',
                    ]) !!}
                    @error('materi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label('tanggal_mulai', 'Tanggal Mulai', ['class' => 'form-label']) !!}
                        {!! Form::date('tanggal_mulai', old('tanggal_mulai'), [
                            'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''),
                            'id' => 'tanggal_mulai',
                            'required',
                        ]) !!}
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('tanggal_selesai', 'Tanggal Selesai', ['class' => 'form-label']) !!}
                        {!! Form::date('tanggal_selesai', old('tanggal_selesai'), [
                            'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''),
                            'id' => 'tanggal_selesai',
                            'required',
                        ]) !!}
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label('jam_mulai', 'Jam Mulai', ['class' => 'form-label']) !!}
                        {!! Form::time('jam_mulai', old('jam_mulai'), [
                            'class' => 'form-control' . ($errors->has('jam_mulai') ? ' is-invalid' : ''),
                            'id' => 'jam_mulai',
                            'required',
                        ]) !!}
                        @error('jam_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('jam_selesai', 'Jam Selesai', ['class' => 'form-label']) !!}
                        {!! Form::time('jam_selesai', old('jam_selesai'), [
                            'class' => 'form-control' . ($errors->has('jam_selesai') ? ' is-invalid' : ''),
                            'id' => 'jam_selesai',
                            'required',
                        ]) !!}
                        @error('jam_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('instruktur', 'Instruktur', ['class' => 'form-label']) !!}
                    {!! Form::select('instruktur', $dataInstruktur, old('instruktur'), [
                        'class' => 'form-control',
                        'placeholder' => 'Pilih Instruktur',
                        'required',
                    ]) !!}
                    @error('instruktur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('ruang', 'Ruang', ['class' => 'form-label']) !!}
                    {!! Form::select(
                        'ruang',
                        [
                            'bawah' => 'Bawah',
                            'atas' => 'Atas',
                        ],
                        old('ruang'),
                        ['class' => 'form-control', 'id' => 'ruang', 'placeholder' => 'Pilih Ruang', 'required'],
                    ) !!}
                    @error('ruang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('hari', 'Pilih Hari', ['class' => 'form-label']) !!}
                    <br>
                    @foreach ($hariOptions as $key => $label)
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('hari[]', $key, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('hari', $label, ['class' => 'form-check-label']) !!}
                        </div>
                    @endforeach
                    @error('hari')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    {!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm me-md-2', 'type' => 'submit']) !!}
                    <a href="{{ route('jadwal.index') }}" class="btn btn-primary">Batal</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
