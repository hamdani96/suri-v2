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

<!-- service -->
<section class="section-lg service-bg-image position-relative" style="background-image: url(images/backgrounds/service-page.png);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Riwayat {{ auth()->user()->name }}</h2>
                <p class="mb-100">Riwayat Kamu Melakukan Kuis</p>
            </div>
            @forelse ($analysis as $item)
              <div class="col-md-6 mb-3">
                  <div class="rounded bg-white p-4 shadow-primary">
                      {{-- <i class="ti-layers-alt round-icon blue mb-4"></i> --}}
                      <h4>Score {{ $item->score }} </h4>
                      <p><a href="#training-{{ $item->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Lihat Hasil Pelatihan Yang Cocok <i class="fa-light fa-arrow-down"></i></a></p>
                  </div>

                  @foreach ($item->relatedTrainingAnalysis as $training)
                  <div class="rounded bg-white p-4 shadow-primary collapse" id="training-{{ $item->id }}">
                      <hr/>
                        @if ($training->relatedTraining->image == null)
                        <i class="ti-layers-alt round-icon blue mb-4"></i>
                        @else
                        <img src="/training_image/{{ $training->relatedTraining->image }}" style="width: 100%" alt="">
                        @endif
                        <h4>{{ $training->relatedTraining->training_title }} </h4>
                        {!! $training->relatedTraining->training_description !!}
                        <hr/>
                  </div>
                @endforeach
              </div>
            @empty
            <div class="col-12">
                <div class="rounded bg-white p-4 shadow-primary text-center">
                    <h4>Kamu Belum Melakukan Kuis</h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <!-- background shapes -->
    <img class="service-bg-1 up-down-animation" src="images/background-shape/feature-bg-2.png" alt="">
    <img class="service-bg-2 left-right-animation" src="images/background-shape/seo-half-cycle.png" alt="">
    <img class="service-bg-3 up-down-animation" src="images/background-shape/team-bg-triangle.png" alt="">
    <img class="service-bg-4 left-right-animation" src="images/background-shape/green-dot.png" alt="">
    <img class="service-bg-5 up-down-animation" src="images/background-shape/team-bg-triangle.png" alt="">
</section>
<!-- /service -->

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
