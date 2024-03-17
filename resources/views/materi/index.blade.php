@extends('layouts.app')

@section('pageTitle', 'Siswa')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Materi</h1>
        <div class="dropdown">
            <div class="btn-group dropstart">
                <button type="button" class="btn bg-secondary-subtle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus text-primary"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button"><a href="{{ route('materi.create') }}"
                                class="btn">Buat Materi
                            </a></button></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-2">
            <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                @include('partials.error')
                <div class="col-md-12">
                    @if ($materi && count($materi) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>gambar</th>
                                    <th>kode</th>
                                    <th>Materi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materi as $row)
                                    <tr>
                                        <td> <img src="{{ asset($row->gambar) }}" class="rounded" alt="..."
                                                style="width: 200px; height: 200px;">
                                        </td>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->materi }}</td>
                                        <td>
                                            <a href="{{ route('materi.edit', ['id' => $row->id]) }}" title="Edit"
                                                data-toggle='tooltip'><span class='fa fa-edit'></span></a>
                                            &nbsp;
                                            <a href="{{ route('materi.deleteForm', ['id' => $row->id]) }}" title="Hapus"
                                                data-toggle='tooltip'><span class='fa fa-trash'></span></a>
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
