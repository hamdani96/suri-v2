@extends('layout.app')

@push('plugin-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
@endpush

@section('header')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">Kuis</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Data Kuis</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('quiz.export') }}" class="btn btn-success float-right text-white mb-2"><i class="fa-light fa-file-excel"></i> Export Excel</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('quiz.create') }}" class="btn btn-primary mb-2 float-right"><i class="fa fa-plus-square"></i> Tambah Data</a>
                        </div>

                        <div class="col-12">
                            <h4 class="card-title">Data Kuis</h4>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Urutan Ke</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban (Ya)</th>
                                            <th>Jawaban (Tidak)</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Ke - {{ $item->sequence }}</td>
                                                <td>{!! $item->question !!}</td>
                                                <td>{{ $item->yes }} Poin</td>
                                                <td>{{ $item->not }} Poin</td>
                                                <td>
                                                    @if ($item->status == 'active')
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('quiz.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit </a>
                                                    <a href="{{ route('quiz.show', $item->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-info"></i> Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
@endpush

@push('custom-js')

    <script>
        $('.datatable').DataTable();
    </script>

@endpush
