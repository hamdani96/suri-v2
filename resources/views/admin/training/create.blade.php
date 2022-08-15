@extends('layout.app')

@push('plugin-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets_admin/dropify/css/dropify.min.css') }}">
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
                  <li class="breadcrumb-item active" aria-current="page">Tambah Pelatihan</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Tambah Data Pelatihan</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah</h4>
                    <form action="{{ route('training.store') }}" method="post" enctype="multipart/form-data"> @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Banner</label>
                                <input type="file" class="dropify @error('image') is-invalid @enderror" required name="image" />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Judul Pelatihan <span class="text-danger">*</span></label>
                                <input type="text" name="training_title" value="{{ old('training_title') }}" placeholder="Masukan nama pelatihan" required id="" class="form-control">
                            </div>
                            <div class="from-group col-md-12 mb-2">
                                <label for="">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="training_description" class="@error('training_description') is-invalid @enderror" required id="editor">{{ old('training_description') }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Start Score <span class="text-danger">*</span></label>
                                <input type="number" name="start_score" class="form-control" value="{{ old('start_code') }}" required id="">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="">End Code <span class="text-danger">*</span></label>
                                <input type="number" name="end_score" value="{{ old('end_score') }}" id="" required class="form-control">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary d-block btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('assets_admin/dropify/js/dropify.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
@endpush

@push('custom-js')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
</script>

<script>
    // dropify
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
</script>
@endpush
