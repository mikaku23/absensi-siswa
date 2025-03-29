<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('rekap.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'pengajuan' ? '' : 'collapsed' }}" href="{{ route('pengajuan.index') }}">
                <i class="fas fa-user-clock"></i>
                <span>Pengajuan</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->