@extends('layout.app')

@section('header')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Dashboard</h1>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4 d-flex align-items-stretch">
            <!-- earnings card -->
            <div class="card bg-primary w-100">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <h4 class="card-title text-white">User</h4>
                  <div class="ms-auto">
                    <span
                      class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-users text-white"></i>
                    </span>
                  </div>
                </div>
                <div class="mt-3">
                  <h2 class="fs-8 text-white mb-0">{{ $analysis }}</h2>
                  <span class="text-white op-5">Yang Melakukan Kuis</span>
                </div>
              </div>
            </div>
          </div>
    </div>

@endsection
