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
                  <li class="breadcrumb-item active" aria-current="page">Hobi</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Data Hobi</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="#modal-create" data-bs-toggle="modal" class="btn btn-primary mb-2"><i class="fa fa-plus-square"></i> Tambah Data</a>
            <a href="{{ route('hobby.export') }}" class="btn btn-success float-right text-white mb-2"><i class="fa-light fa-file-excel"></i> Export Excel</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Hobi</h4>
                    {{-- <a href="#modal-create" data-toggle="modal" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i> Tambah Data</a> --}}
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th >Nama Hobi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hobbies as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->hobby_name }}</td>
                                        <td>
                                            <a href="{{ route('hobby.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit </a>
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

{{-- modal create --}}
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hobi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('hobby.store') }}" method="post"> @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Hobi</label>
                        <input type="text" name="hobby_name" value="{{ old('hobby_name') }}" placeholder="Masukan nama hobi" id="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
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
