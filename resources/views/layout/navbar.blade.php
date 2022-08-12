<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="/assets_admin/logo/suri-logo.png" alt="homepage" class="dark-logo" style="width: 50px" />
                </b>
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="mdi mdi-menu"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                        href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                            class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                    </form>
                </li> --}}
                <li>
                    <h3 class="font-weight-bold">System Resource Indikator</h3>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{ auth()->user()->avatar_url }}" alt="user" width="30" class="profile-pic rounded-circle"/>
                      <div class="d-none d-md-flex">
                        <span class="ms-2">Hi,
                          <span class="text-dark fw-bold">{{ auth()->user()->name }}</span></span>
                        <span>
                          <i data-feather="chevron-down" class="feather-sm"></i>
                        </span>
                      </div>
                    </a>
                    <div class=" dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                      <ul class="list-style-none">
                        <li class="p-30 pb-2">
                          <div class="rounded-top d-flex align-items-center">
                            <h3 class="card-title mb-0">User Profile</h3>
                            <div class="ms-auto">
                              <a href="javascript:void(0)" class="link py-0">
                                <i data-feather="x-circle"></i>
                              </a>
                            </div>
                          </div>
                          <div class=" d-flex align-items-center mt-4 pt-3 pb-4 border-bottom">
                            <img src="{{ auth()->user()->avatar_url }}" alt="user" width="90" class="rounded-circle"/>
                            <div class="ms-4">
                              <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                              <span class="text-muted">Admin</span>
                              <p class="text-muted mb-0 mt-1">
                                <i data-feather="mail" class="feather-sm me-1"></i>
                                {{ auth()->user()->email }}
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="p-30 pt-0">
                          <div class="mt-4">
                            <a class="btn btn-info text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                              Logout
                            </a>
                          </div>
                        </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets_admin/images/users/profile.png" alt="user" class="rounded-circle" width="31">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item text-danger">
                            <i class="mdi mdi-logout-variant text-danger"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            Logout
                        </a>
                    </ul>
                </li> --}}
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
