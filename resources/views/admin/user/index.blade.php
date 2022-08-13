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
                  <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Data User</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('user.export') }}" class="btn btn-success float-right text-white mb-2"><i class="fa-light fa-file-excel"></i> Export Excel</a>
            <a href="{{ route('user.export_pdf') }}" class="btn btn-danger float-right text-white mb-2" style="margin-right: 3px"><i class="fa-light fa-file-pdf"></i> Export PDF</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <h4 class="card-title">Data User</h4>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Hobi</th>
                                            <th>Jabatan</th>
                                            <th>Status Jabatan</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->relatedDetailUser->relatedHobby->hobby_name }}</td>
                                                <td>{{ $item->relatedDetailUser->relatedPosition->position_name }}</td>
                                                <td>
                                                    @if ($item->relatedDetailUser->position_status == 'freelance')
                                                        Freelance
                                                    @elseif ($item->relatedDetailUser->position_status == 'permanent_employee')
                                                        Karyawan Tetap
                                                    @elseif ($item->relatedDetailUser->position_status == 'internship')
                                                        Internship
                                                    @endif
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
