
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
                 <i class="bi bi-person"></i>
                 <span>Guru</span>
             </a>
         </li>
     </ul>

 </aside><!-- End Sidebar-->