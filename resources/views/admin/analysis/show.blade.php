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
                  <li class="breadcrumb-item active" aria-current="page">Hasil Analisa Kuis</li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Detail</h1>
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
                            <h4 class="card-title">Detail Analisa Kuis {{ $analysis->relatedUser->name }}</h4>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td>Nama User</td>
                                    <td>: {{ $analysis->relatedUser->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: {{ $analysis->relatedUser->email }}</td>
                                </tr>
                                <tr>
                                    <td>Score</td>
                                    <td>: {{ $analysis->score }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td>Pertanyaan</td>
                                    <td>: <a href="#modal-question-{{ $analysis->id }}" data-bs-toggle="modal" class="text-primary"><i class="fa fa-info-circle"></i> Lihat Detail Pertanyaan</a></td>
                                </tr>
                                <tr>
                                    <td>Pelatihan</td>
                                    <td>: 
                                        @foreach ($analysis->relatedTrainingAnalysis as $item)
                                        <a href="#modal-training-{{ $item->id }}" data-bs-toggle="modal" class="text-primary"><i class="fa fa-info-circle"></i> {{ $loop->iteration }}. {{ $item->relatedTraining->training_title }}</a> <br/>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal question --}}
    <div class="modal fade" id="modal-question-{{ $analysis->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Pertanyaan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($analysis->relatedDetailAnalysis as $item)
                    <li>
                        <div class="row">
                            <div class="col-12">
                                <h5>{!! $item->relatedQuiz->question !!}</h5>
                            </div>
                            <div class="col-12">
                                <p>Poin : {{ $item->score }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
          </div>
        </div>
      </div>
    {{-- modal question --}}

    @foreach ($analysis->relatedTrainingAnalysis as $item)
    <div class="modal fade" id="modal-training-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Pelatihan {{ $item->relatedTraining->training_title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img src="/training_image/{{ $item->relatedTraining->image }}" style="width: 100%" alt="">
                    </div>
                    <div class="col-12 mt-3">
                        <h3 c>{{ $item->relatedTraining->training_title }}</h5>
                        {!! $item->relatedTraining->training_description !!}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach

@endsection

@push('plugin-js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endpush

