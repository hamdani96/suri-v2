<ul id="sidebarnav">
    <li class="sidebar-item {{ Request::is('admin*') ? 'selected' : '' }} ">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false">
            <i class="mdi mdi-view-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <li class="nav-small-cap">
        <i class="nav-small-line"></i>
        <span class="hide-menu">Master Data</span>
    </li>
    <li class="sidebar-item {{ Request::is('hobby*') ? 'selected' : '' }} ">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('hobby.index') }}" aria-expanded="false">
            <i class="fa-thin fa-person-sledding"></i>
            <span class="hide-menu">Hobi</span>
        </a>
    </li>
    <li class="sidebar-item {{ Request::is('position*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('position.index') }}" aria-expanded="false">
            <i class="fa-light fa-water-ladder"></i>
            <span class="hide-menu">Jabatan</span>
        </a>
    </li>
    <li class="sidebar-item {{ Request::is('training*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('training.index') }}" aria-expanded="false">
            <i class="fa-light fa-books"></i>
            <span class="hide-menu">Pelatihan</span>
        </a>
    </li>
    <li class="sidebar-item {{ Request::is('quiz*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('quiz.index') }}" aria-expanded="false">
            <i class="fa-light fa-message-question"></i>
            <span class="hide-menu">Kuis</span>
        </a>
    </li>
    <li class="nav-small-cap">
        <i class="nav-small-line"></i>
        <span class="hide-menu">Hasil Kuis</span>
    </li>
    <li class="sidebar-item {{ Request::is('user*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
            <i class="fa-light fa-users"></i>
            <span class="hide-menu">Data User</span>
        </a>
    </li>
    <li class="sidebar-item {{ Request::is('analysis*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('analysis.index') }}" aria-expanded="false">
            <i class="fa-light fa-square-poll-vertical"></i>
            <span class="hide-menu">Hasil Kuis</span>
        </a>
    </li>
</ul>
