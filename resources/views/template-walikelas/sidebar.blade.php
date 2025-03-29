<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard-walikelas') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'absen' ? '' : 'collapsed' }}" href="{{ route('absenWalikelas.index') }}">
                <i class="bi bi-calendar-check"></i>
                <span>Absen</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->