<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('index.php') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="dropdown-divider my-0">

    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="dropdown-divider">

    <li class="nav-item {{ request()->is('scan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('scan') }}">
            <i class="fa fa-tachometer-alt"></i>
            <span>Scan</span>
        </a>
    </li>

    <hr class="dropdown-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#collapseDataUmum" data-bs-toggle="collapse"
            data-bs-target="#collapseDataUmum" aria-expanded="true" aria-controls="collapseDataUmum"
            data-bs-parent="#accordionSidebar">
            <i class="fa fa-folder"></i>
            <span>Data Umum</span>
        </a>
        <div class="collapse" id="collapseDataUmum" aria-labelledby="headingDataUmum">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('materi.index') }}">Materi</a>
                <a class="collapse-item" href="{{ route('karyawan.index') }}">Karyawan</a>
                <a class="collapse-item" href="{{ route('jadwal.index') }}">Jadwal</a>
            </div>
        </div>
    </li>

    <hr class="dropdown-divider">

    <div class="sidebar-heading fw-bold">
        Data Absensi
    </div>

    <li class="nav-item {{ request()->is('siswa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fa fa-user"></i>
            <span>Siswa</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('absensi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('absensi.index') }}">
            <i class="fa fa-table"></i>
            <span>Absensi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('invalid') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('invalid.index') }}">
            <i class="fa fa-exclamation-triangle"></i>
            <span>Invalid</span>
        </a>
    </li>

    <hr class="dropdown-divider">

    <div class="sidebar-heading fw-bold">
        Laporan
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#collapseRekap" data-bs-toggle="collapse" data-bs-target="#collapseRekap"
            aria-expanded="true" aria-controls="collapseRekap" data-bs-parent="#accordionSidebar">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rekap Absensi</span>
        </a>
        <div class="collapse" id="collapseRekap" aria-labelledby="headingRekap">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('rekap.hari') }}">Harian</a>
                <a class="collapse-item" href="{{ route('rekap.bulan') }}">Bulanan</a>
                <a class="collapse-item" href="{{ route('rekap.tahun') }}">Tahunan</a>
            </div>
        </div>
    </li>

    <hr class="dropdown-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    $(document).ready(function() {
        $('.nav-link[data-bs-toggle="collapse"]').on('click', function() {
            var targetCollapse = $($(this).data('bs-target'));

            // Menutup collapse yang aktif
            if (targetCollapse.hasClass('show')) {
                targetCollapse.collapse('hide');
            } else {
                // Menutup collapse yang lain
                $('.collapse.show').each(function() {
                    $(this).collapse('hide');
                });
            }
        });
    });
</script>
