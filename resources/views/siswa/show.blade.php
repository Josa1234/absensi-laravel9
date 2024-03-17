@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('nama', 'Nama') !!}
                    {!! Form::text('nama', $datasiswa->nama, [
                        'class' => 'form-control',
                        'readonly',
                    ]) !!}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                        {!! Form::text('tempat_lahir', $datasiswa->tempat_lahir, [
                            'class' => 'form-control',
                            'readonly',
                        ]) !!}
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
                        {!! Form::date('tanggal_lahir', $datasiswa->tanggal_lahir, [
                            'class' => 'form-control',
                            'readonly',
                        ]) !!}
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                        {!! Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], $datasiswa->jenis_kelamin, [
                            'class' => 'form-control',
                            'readonly',
                        ]) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label('uid', 'UID') !!}
                        {!! Form::text('uid', $datasiswa->uid, [
                            'class' => 'form-control',
                            'readonly',
                        ]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::text('phone', $datasiswa->phone, [
                            'class' => 'form-control',
                            'readonly',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('alamat', 'Alamat') !!}
                    {!! Form::textarea('alamat', $datasiswa->alamat, [
                        'class' => 'form-control',
                        'rows' => '2',
                        'readonly',
                    ]) !!}
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
