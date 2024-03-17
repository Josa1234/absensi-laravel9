@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Materi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! Form::open(['route' => 'materi.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('kode', 'Kode', ['class' => 'form-label']) !!}
                    {!! Form::text('kode', old('kode'), [
                        'class' => 'form-control' . ($errors->has('kode') ? ' is-invalid' : ''),
                        'id' => 'kode',
                        'required',
                    ]) !!}
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('materi', 'Materi') !!}
                    {!! Form::text('materi', old('materi'), [
                        'class' => 'form-control',
                        'placeholder' => 'Input materi',
                        'required',
                    ]) !!}
                    @if ($errors->has('materi'))
                        <div class="invalid-feedback">{{ $errors->first('materi') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('gambar', 'Gambar', ['class' => 'form-label']) !!}
                    {!! Form::file('gambar', [
                        'class' => 'form-control' . ($errors->has('gambar') ? ' is-invalid' : ''),
                        'id' => 'gambar',
                        'accept' => 'image/*',
                        'required',
                    ]) !!}
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if (isset($materi) && $materi->gambar)
                        <div>File Sebelumnya: {{ $materi->gambar }}</div>
                    @endif
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    {!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm me-md-2', 'type' => 'submit']) !!}
                    <a href="{{ route('materi.index') }}" class="btn btn-primary">Batal</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
