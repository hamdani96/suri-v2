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
                  <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Jabatan {{ $position->position_name }}</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Edit Data Jabatan {{ $position->position_name }}</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Edit</h4>
                    <form action="{{ route('position.update', $position->id) }}" method="post"> @csrf @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Nama Jabatan</label>
                                <input type="text" name="position_name" value="{{ old('position_name', $position->position_name) }}" placeholder="Masukan nama jabatan" id="" class="form-control">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary d-block btn-block">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <a href="{{ route('position.delete', $position->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="btn btn-danger text-white float-right"><i class="fa fa-trash"></i> Hapus</a>
        </div>
    </div>


@endsection

