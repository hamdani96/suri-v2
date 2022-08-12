<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>SURI</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** /assets/plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap/bootstrap.min.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="/assets/plugins/themify-icons/themify-icons.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="/assets/plugins/slick/slick.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="/assets/plugins/Venobox/venobox.css">
  <!-- aos -->
  <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

  <!-- Main Stylesheet -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">

  <!--Favicon-->
  <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/quiz.css">

  <style>
    .hero-section {
        margin-bottom: 0;
    }
  </style>

</head>
<body>


<!-- navigation -->
<section class="fixed-top navigation">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets_admin/logo/suri-logo.png" alt="logo" style="width: 70px"></a>
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- navbar -->
      <div class="collapse navbar-collapse text-center" id="navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
        </ul>
        @if (Route::has('login'))
         @auth
            <div class="dropdown">
                <a href="#!" class="btn btn-primary ml-lg-3 primary-shadow dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/profile/profile.svg') }}" alt="" style="width: 40px"> Hai, {{ auth()->user()->name }}
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <i class="fa-light fa-arrow-right-from-bracket"></i> Logout
                    </a>
                  </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary ml-lg-3 primary-shadow">Login</a>
            @endauth
        @endif
      </div>
    </nav>
  </div>
</section>
<!-- /navigation -->

<!-- hero area -->
<section class="hero-section hero" data-background="" style="background-image: url(/assets/images/hero-area/banner-bg.png);">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center zindex-1">
        <h1 class="mb-3">SURI<br>
          System Resource Indikator</h1>
        <p class="mb-4">Lakukan kuis dan ketahui pelatihan apa yang cocok untuk kamu.</p>
        @if (Route::has('login'))
            @auth
            <a href="#quiz" class="btn btn-secondary btn-lg page-scroll mb-4">Mulai Sekarang</a> <br/>
            <a href="{{ route('hisotryAnalysisQuiz') }}" class="text-dark">Klik Untuk Lihat Kuis Yang Pernah Kamu Lakukan</a>
            @else
            <a href="{{ url('register') }}" class="btn btn-secondary btn-lg">Daftar Sekarang</a>
            @endauth
        @endif
        <!-- banner image -->
        {{-- <img class="img-fluid w-100 banner-image" src="/assets/images/hero-area/banner-img.png" alt="banner-img"> --}}

      </div>
    </div>
  </div>
  <!-- background shapes -->
  <div id="scene">
    <img class="img-fluid hero-bg-1 up-down-animation" src="/assets/images/background-shape/feature-bg-2.png" alt="">
    <img class="img-fluid hero-bg-2 left-right-animation" src="/assets/images/background-shape/seo-ball-1.png" alt="">
    <img class="img-fluid hero-bg-3 left-right-animation" src="/assets/images/background-shape/seo-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-4 up-down-animation" src="/assets/images/background-shape/green-dot.png" alt="">
    <img class="img-fluid hero-bg-5 left-right-animation" src="/assets/images/background-shape/blue-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-6 up-down-animation" src="/assets/images/background-shape/seo-ball-1.png" alt="">
    <img class="img-fluid hero-bg-7 left-right-animation" src="/assets/images/background-shape/yellow-triangle.png" alt="">
    <img class="img-fluid hero-bg-8 up-down-animation" src="/assets/images/background-shape/service-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-9 up-down-animation" src="/assets/images/background-shape/team-bg-triangle.png" alt="">
  </div>
</section>
<!-- /hero-area -->

{{-- quiz area --}}
@if (Route::has('login'))
@auth
<section class="section feature mb-0" id="quiz">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
            <h2 class="section-title">Kuis Di Mulai</h2>
            <p class="mb-100">Jawab semua pertanyaan yang cocok dengan pilihan kamu.<br>Tidak perlu terburu buru.</p>
            </div>
        </div>
    </div>
</section>

<form action="{{ route('storeQuiz') }}" method="post"> @csrf
    @foreach ($quizs as $item)
        <section class="section" id="section-{{ $item->id }}">
            <main>
                <div class="text-container ">
                    <p class="text-dark">Pertanyaan Ke {{ $item->sequence }} Dari {{ $quizs->count() }}</p>
                    <h4 class="text-dark" style="font-weight: 900; color: #000 !important;">{!! $item->question !!}</>
                </div>
                <div class="quiz-options">
                    <input type="radio" class="input-radio yes-{{ $item->id }} jshdgdgwgdwfdfwdwjfdjwwdwdco" id="yes-{{ $item->id }}" name="answer-{{ $item->id }}" value="{{ $item->yes }}" required>
                    <label class="radio-label jsjwjdwjdwjdwco" for="yes-{{ $item->id }}">
                        <span class="alphabet">Yes</span><img class="icon jdsjkefkefkefefexco" src="https://res.cloudinary.com/dvhndpbun/image/upload/v1588518387/jdsjkefkefkefefexco.svg" alt="">
                    </label>
                    <input type="radio" class="input-radio not-{{ $item->id }} jshdgdgwgdwfdfwdwjfdjwwdwdco" id="not-{{ $item->id }}" name="answer-{{ $item->id }}" value="{{ $item->not }}">
                    <label class="radio-label jsjwjdwjdwjdwin" for="not-{{ $item->id }}">
                        <span class="alphabet">No</span> <img class="icon jdsjkefkefkefefexco" src="https://res.cloudinary.com/dvhndpbun/image/upload/v1588518387/jdsjkefkefkefefexco.svg">
                    </label>
                </div>
            </main>
        </section>
    @endforeach
    <section class="section text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <p>Submit untuk menganalisa pelatihan yang cocok untuk kamu.</p>
    </section>
</form>
@else
<section class="section feature mb-0" id="quiz">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
            <h2 class="section-title">Login untuk melakukan kuis</h2>
            <p class="mb-100">Lakukan kuis dan ketahui pelatihan apa yang cocok untuk kamu.</p>
            </div>
        </div>
    </div>
</section>
@endauth
@endif
{{-- quiz area --}}

<!-- footer -->
<footer class="footer-section footer" style="background-image: url(/assets/images/backgrounds/footer-bg.png);">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center text-lg-left mb-4 mb-lg-0">
        <!-- logo -->
        <a href="{{ url('/') }}">
          <img class="img-fluid" src="/assets_admin/logo/suri-logo.png" style="width: 70px" alt="logo">
        </a>
      </div>
      <!-- footer menu -->
      <nav class="col-lg-8 align-self-center mb-5">
        <ul class="list-inline text-lg-right text-center footer-menu">
          <li class="list-inline-item active"><a href="{{ url('/') }}">Home</a></li>
        </ul>
      </nav>
      <!-- footer social icon -->
      <nav class="col-12">
        <ul class="list-inline text-lg-right text-center social-icon">
          <li class="list-inline-item">
            <a class="facebook" href="#!"><i class="ti-facebook"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="twitter" href="#!"><i class="ti-twitter-alt"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="linkedin" href="#!"><i class="ti-linkedin"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="black" href="#!"><i class="ti-github"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="/assets/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="/assets/plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="/assets/plugins/Venobox/venobox.min.js"></script>
<!-- aos -->
<script src="/assets/plugins/aos/aos.js"></script>
<!-- Main Script -->
<script src="/assets/js/script.js"></script>

</body>
</html>
