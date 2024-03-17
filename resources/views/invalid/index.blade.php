@extends('layouts.app')

@section('pageTitle', 'Invalid')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Kartu Invalid</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Invalid Tap</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                @include('partials.error')
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('invalid.delete') }}" class="btn btn-danger pull-right" id="DelAllBtn">Hapus
                            Semua
                            Data</a>
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => 'invalid.index', 'method' => 'get']) !!}
                        <div class="col">
                            {!! Form::text('search', $search, [
                                'class' => 'form-control',
                                'placeholder' => 'Pencarian data kartu invalid',
                                'name' => 'search',
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <br>

                @if ($dataInvalid && count($dataInvalid) > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>UID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataInvalid as $row)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($row->tanggal)) }}</td>
                                    <td>{{ $row->waktu }}</td>
                                    <td>{{ $row->uid }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <a href="{{ route('invalid.create', ['uid' => $row->uid]) }}" title="Daftarkan"
                                            data-toggle="tooltip"><span class="fa fa-plus"></span></a> &nbsp
                                        <a href="{{ route('invalid.deleteForm', ['id' => $row->id]) }}" title="Hapus"
                                            data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataInvalid->links('partials.pagination') }}
                @else
                    <p class='lead'><em>No records were found.</em></p>
                    <script defer>
                        document.getElementById("DelAllBtn").className = "btn btn-danger pull-right disabled";
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
