<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/infoPmb') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img style="width: 40px" src="{{ asset('assets/img/stkip.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">SIPEMA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>

    <!-- <li class="nav-item {{ request()->is('infoPmb') ? 'active' : '' }}">
        <a class="nav-link " href="{{ url('infoPmb') }}">
            <i class="fas fa-clipboard-check"></i>
            <span>Informasi PMB</span></a>
    </li> -->

    <li class="nav-item {{ request()->is('info') ? 'active' : '' }}">
        <a class="nav-link " href="{{ url('info') }}">
            <i class="fas fa-id-card"></i>
            <span>Informasi Siswa</span></a>
    </li>

    <li class="nav-item {{ request()->is('pembayaran') || request()->is('pembayaran/konfirmasi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pembayaran') }}">
            <i class="fas fa-hand-holding-usd"></i>
            <span>Informasi Pembayaran</span></a>
    </li>

    @if (auth()->user()->jalur == 'test')
    <li class="nav-item {{ request()->is('infoTes') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('infoTes') }}">
            <i class="fas fa-tasks"></i>
            <span>Informasi Tes PMB</span></a>
    </li>
    @endif

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Isi Form
    </div>

    <li class="nav-item {{ request()->is('calon') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('calon') }}">
            <i><strong>1</strong></i>
            <span>Form Calon Mahasiswa</span></a>
    </li>

    <li class="nav-item {{ request()->is('pendidikan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pendidikan') }}">
            <i><strong>2</strong></i>
            <span>Form Pendidikan Terakhir</span></a>
    </li>

    <li class="nav-item {{ request()->is('info-pmb') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('info-pmb') }}">
            <i><strong>3</strong></i>
            <span>Perolehan Informasi PMB</span></a>
    </li>

    <li class="nav-item {{ request()->is('ortu') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('ortu') }}">
            <i><strong>4</strong></i>
            <span>Form Orang Tua</span></a>
    </li>

    <li class="nav-item {{ request()->is('upload') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('upload') }}">
            <i><strong>5</strong></i>
            <span>Form Upload Berkas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>