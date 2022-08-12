@extends('layout.app')

@push('plugin-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
@endpush

@section('header')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Detail Pelatihan {{ $training->training_title }}</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <h4 class="card-title">Detail Pelatihan {{ $training->training_title }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Judul Pelatihan</th>
                                        <td>: {{ $training->training_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Skor Di Mulai Dari - Berkahir Dengan</th>
                                        <td>: {{ $training->start_score }} - {{ $training->end_score }}</td>
                                    </tr>
                                    <tr>
                                        <th>Banner</th>
                                        <td>
                                            <a data-fancybox="gallery" href="/training_image/{{ $training->image }}">
                                                <img src="/training_image/{{ $training->image }}" style="width: 100px" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Deskripsi</h4>
                    {!! $training->training_description !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endpush
