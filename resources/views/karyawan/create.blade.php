@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! Form::open(['route' => 'karyawan.store', 'method' => 'post', 'id' => 'karyawanForm']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('nama', 'Nama') !!}
                    {!! Form::text('nama', old('nama'), [
                        'class' => 'form-control',
                        'placeholder' => 'Input nama karyawan',
                        'required',
                    ]) !!}
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                        {!! Form::text('tempat_lahir', old('tempat_lahir'), [
                            'class' => 'form-control',
                            'placeholder' => 'Input tempat lahir karyawan',
                            'required',
                        ]) !!}
                        @if ($errors->has('tempat_lahir'))
                            <div class="invalid-feedback">{{ $errors->first('tempat_lahir') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
                        {!! Form::date('tanggal_lahir', old('tanggal_lahir'), [
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                        @if ($errors->has('tanggal_lahir'))
                            <div class="invalid-feedback">{{ $errors->first('tanggal_lahir') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                        {!! Form::select(
                            'jenis_kelamin',
                            ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'],
                            old('jenis_kelamin'),
                            [
                                'class' => 'form-control',
                                'placeholder' => 'Pilih jenis kelamin',
                                'required',
                            ],
                        ) !!}
                        @if ($errors->has('jenis_kelamin'))
                            <div class="invalid-feedback">{{ $errors->first('jenis_kelamin') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nip', 'NIP') !!}
                    {!! Form::text('nip', old('nip'), [
                        'class' => 'form-control',
                        'placeholder' => 'Input NIP karyawan',
                        'required',
                    ]) !!}
                    @if ($errors->has('nip'))
                        <div class="invalid-feedback">{{ $errors->first('nip') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('jabatan', 'Jabatan') !!}
                    {!! Form::select(
                        'jabatan',
                        [
                            'Instruktur' => 'Intruktur',
                            'Marketing' => 'Marketing',
                        ],
                        old('jabatan'),
                        ['class' => 'form-control', 'placeholder' => 'Pilih Jabatan', 'required'],
                    ) !!}
                    @if ($errors->has('jabatan'))
                        <div class="invalid-feedback">{{ $errors->first('jabatan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Phone') !!}
                    {!! Form::text('phone', old('phone'), [
                        'class' => 'form-control',
                        'placeholder' => 'Input number phone',
                        'required',
                    ]) !!}
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('alamat', 'Alamat') !!}
                    {!! Form::textarea('alamat', old('alamat'), [
                        'class' => 'form-control',
                        'placeholder' => 'Input alamat rumah karyawan',
                        'rows' => '2',
                        'required',
                    ]) !!}
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                    @endif
                </div>
                <hr>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    {!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm me-md-2', 'type' => 'submit']) !!}
                    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Batal</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
