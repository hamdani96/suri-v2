@extends('layout.app')

@section('header')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">Kuis</li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Kuis {{ $quiz->question }}</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Edit Data Kuis {{ $quiz->question }}</h1>
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
                    <form action="{{ route('quiz.update', $quiz->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('PUT')
                        <div class="row">
                            <div class="from-group col-md-12 mb-2">
                                <label for="">Pertanyaan <span class="text-danger">*</span></label>
                                <textarea name="question" class="@error('question') is-invalid @enderror" id="editor">{{ old('question', $quiz->question) }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jawaban (Ya) Memiliki Poin ? <span class="text-danger">*</span></label>
                                <input type="number" name="yes" class="form-control" value="{{ old('yes', $quiz->yes) }}" required id="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jawaban (Tidak) Memiliki Poin ? <span class="text-danger">*</span></label>
                                <input type="number" name="not" class="form-control" value="{{ old('not', $quiz->not) }}" required id="">
                            </div>
                            <div class="form-grouop col-md-6">
                                <label for="">Urutan Pertanyaan <span class="text-danger">*</span></label>
                                <input type="number" name="sequence" class="form-control" value="{{ old('sequence', $quiz->sequence) }}" required id="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="active" {{ $quiz->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">
                                      Aktif
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" {{ $quiz->status == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inactive">
                                      Tidak Aktif
                                    </label>
                                  </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary d-block btn-block">Update</button>
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

@endpush
