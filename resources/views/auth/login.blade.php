<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy bootstrap dashboard admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, Flexy bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Flexy bootstrap dashboard is powerful and clean admin dashboard template"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Suri - Login</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets_admin/images/favicon.png"/>
    <!-- Custom CSS -->
    <link href="/assets_admin/dist/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_admin/izitoast/css/iziToast.min.css') }}">
  </head>

  <body>
    <div class="main-wrapper">
      <!-- ============================================================= -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================= -->
      <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#fec80e" stroke-width="2"></path>
          <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#fec80e" stroke-width="2"></path>
          <path id="teabag" fill="#fec80e" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
          <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#fec80e"></path>
          <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#fec80e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <!-- ============================================================= -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================= -->
      <!-- ============================================================= -->
      <!-- Login box.scss -->
      <!-- ============================================================= -->
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center mt-5">
        <div class="auth-box p-4 bg-white rounded">
          <div id="loginform">
            <div class="logo">
              <h3 class="box-title mb-3">Sign In</h3>
            </div>
            <!-- Form -->
            <div class="row">
              <div class="col-12">
                <form class="form-horizontal mt-3 form-material" id="loginform" action="{{ route('login') }}" method="POST"> @csrf
                    <div class="form-group mb-3">
                        <div class="">
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" id="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                  <div class="form-group mb-4">
                    <div class="">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  {{-- <div class="form-group">
                    <div class="d-flex">
                      <div class="checkbox checkbox-info pt-0">
                        <input
                          id="checkbox-signup"
                          type="checkbox"
                          class="material-inputs chk-col-indigo"
                        />
                        <label for="checkbox-signup"> Remember me </label>
                      </div>
                    </div>
                  </div> --}}
                  <div class="form-group text-center mt-4 mb-3">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-primary d-block w-100 waves-effect waves-light">Log in</button>
                    </div>
                  </div>
                  <div class="form-group mb-0 mt-4">
                    <div class="col-sm-12 justify-content-center d-flex">
                      <p>
                        Don't have an account?
                        <a
                          href="{{ route('register') }}"
                          class="text-primary font-weight-medium ms-1"
                          >Sign Up</a
                        >
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div id="recoverform">
            <div class="logo">
              <h3 class="font-weight-medium mb-3"></h3>
              <span class="text-muted">Masukan Email dan Password Untuk Melanjutkan</span>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================= -->
      <!-- Login box.scss -->
      <!-- ============================================================= -->
    </div>
    <!-- ============================================================= -->
    <!-- All Required js -->
    <!-- ============================================================= -->
    <script src="/assets_admin/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets_admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("assets_admin/izitoast/js/iziToast.min.js") }}"></script>
    <!-- ============================================================= -->
    <!-- This page plugin js -->
    <!-- ============================================================= -->

    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
    </script>
    @if(Session::has('message'))
    <script>
        iziToast.success({
            title: "{{ Session::get('title') }}",
            message: "{{ Session::get('message') }}",
            position: 'topRight'
        });
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        iziToast.error({
            message: "{{ Session::get('error') }}",
            position: 'topRight'
        });
    </script>
    @endif
  </body>
</html>
