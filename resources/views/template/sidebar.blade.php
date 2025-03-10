<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $menu == 'home' ? '' : 'collapsed' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'siswa' ? '' : 'collapsed' }}" href="{{ route('siswa.index') }}">
                <i class="bi bi-person"></i>
                <span>Siswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'guru' ? '' : 'collapsed' }}" href="{{ route('guru.index') }}">
                <i class="bi bi-person-workspace"></i>
                <span>Guru</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'local' || $menu == 'jurusan' ? '' : 'collapsed' }}" href="{{ route('local.index') }}">
                <i class="bi bi-building"></i>
                <span>Local</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $menu == 'walikelas' ? '' : 'collapsed' }}" href="{{ route('walikelas.index') }}">
                <i class="ri-nurse-fill"></i>
                <span>Wali Kelas</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->