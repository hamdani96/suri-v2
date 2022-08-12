<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Suri - Halaman Admin</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets_admin/images/favicon.png">
    <!-- Custom CSS -->
    <link href="/assets_admin/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets_admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets_admin/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_admin/izitoast/css/iziToast.min.css') }}">

    <style>
        .float-right {
            float: right;
        }

        .page-breadcrumb {
            padding: 30px 30px 0 30px;
        }
    </style>

    @stack('plugin-css')
    @stack('custom-css')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        @include('layout.navbar')
        <!-- End Topbar header -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    @include('layout.sidebar')

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            @yield('header')

            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            @include('layout.footer')
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="/assets_admin/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets_admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <script src="/assets_admin/dist/js/app.min.js"></script>
    <script src="/assets_admin/dist/js/app.init.js"></script>
    <script src="/assets_admin/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets_admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets_admin/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/assets_admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets_admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets_admin/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/assets_admin/dist/js/pages/dashboards/dashboard1.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets_admin/dist/js/feather.min.js"></script>
    <script src="/assets_admin/dist/js/custom.min.js"></script>
    <script src="{{ asset("assets_admin/izitoast/js/iziToast.min.js") }}"></script>
    <script>
        var exampleModal = document.getElementById("samedata-modal");
        exampleModal.addEventListener("show.bs.modal", function (event) {
          // Button that triggered the modal
          var button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          var recipient = button.getAttribute("data-bs-whatever");
          // If necessary, you could initiate an AJAX request here
          // and then do the updating in a callback.
          //
          // Update the modal's content.
          var modalTitle = exampleModal.querySelector(".modal-title");
          var modalBodyInput = exampleModal.querySelector(".modal-body input");

          modalTitle.textContent = "New message to " + recipient;
          modalBodyInput.value = recipient;
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
    @stack('plugin-js')
    @stack('custom-js')
</body>

</html>
