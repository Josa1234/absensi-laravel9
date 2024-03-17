@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Data Kartu Invalid</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftarkan Kartu Invalid</h6>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'invalid.store', 'method' => 'post']) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', old('nama'), [
                            'class' => 'form-control',
                            'placeholder' => 'Input nama siswa',
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
                                'placeholder' => 'Input tempat lahir siswa',
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
                            {!! Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], old('jenis_kelamin'), [
                                'class' => 'form-control',
                                'placeholder' => 'Pilih jenis kelamin',
                                'required',
                            ]) !!}
                            @if ($errors->has('jenis_kelamin'))
                                <div class="invalid-feedback">{{ $errors->first('jenis_kelamin') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('uid', 'UID') !!}
                            {!! Form::text('uid', $dataInvalid->uid, [
                                'class' => 'form-control',
                                'placeholder' => 'Input UID kartu absensi',
                                'readonly',
                            ]) !!}
                        </div>
                        @if ($errors->has('uid'))
                            <div class="invalid-feedback">{{ $errors->first('uid') }}</div>
                        @endif
                        <div class="form-group col-md-6">
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
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat') !!}
                        {!! Form::textarea('alamat', old('alamat'), [
                            'class' => 'form-control',
                            'placeholder' => 'Input alamat rumah siswa',
                            'rows' => '2',
                            'required',
                        ]) !!}
                        @if ($errors->has('alamat'))
                            <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                        @endif
                    </div>
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-success btn-sm me-md-2', 'type' => 'submit']) !!}
                        <a href="{{ route('invalid.index') }}" class="btn btn-primary">Batal</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection