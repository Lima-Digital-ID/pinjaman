<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Fitur
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pinjaman</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Jenis Pinjaman</h6>
          @php
              $urlJenis = \Config::get('api_config.jenis_pinjaman');
              $jenisPinjaman = \Http::withToken(Session::get('token'))->get($urlJenis);
              $resJenis = json_decode($jenisPinjaman, false);
              if($resJenis->status == 'success') {
                $itemJenis = json_decode($jenisPinjaman, true);
              }
              else {
                $itemJenis = null;
              }
              $jenisPinjaman = json_decode($jenisPinjaman, true);
              $route = '';
          @endphp
          @foreach ($jenisPinjaman['data'] as $i => $item)
          @php
              $route = 'pinjaman.';

              if (strpos(strtolower($item['jenis_pinjaman']), 'cepat') != false){
                $route = $route .'cepat';
              }
              if (strpos(strtolower($item['jenis_pinjaman']), 'modal') != false) {
                $route = $route .'modal';
              }
              if (strpos(strtolower($item['jenis_pinjaman']), 'umroh') != false) {
                $route = $route .'umroh';
              }
          @endphp
          <a class="collapse-item" href="{{ route($route) }}">{{ ucwords($item['jenis_pinjaman']) }}</a>
          @endforeach 
          {{-- <a class="collapse-item" href="{{ route('pinjaman.modal') }}">Pinjaman Modal</a>
          <a class="collapse-item" href="{{ route('pinjaman.dana.umroh') }}">Dana Umroh</a> --}}
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Settings</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelengkapan profile</h6>
          <a class="collapse-item" href="utilities-color.html">Profile</a>
          <a class="collapse-item" href="{{ route('riwayat') }}">Riwayat Pengajuan Pinjaman</a>
          <a class="collapse-item" href="utilities-animation.html">Tagihan</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedData" aria-expanded="true" aria-controls="collapsedData">
        <i class="fas fa-fw fa-user"></i>
        <span>Kelengkapan Data</span>
      </a>
      <div id="collapsedData" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Verivikasi data</h6>
          <a class="collapse-item" href="{{ route('personal.data') }}">Data diri</a>
          <a class="collapse-item" href="{{ route('scoring') }}">Data Lainnya</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kebijakan & Privasi</span></a>
    </li>

  <form method="POST" action="#">
    <li class="nav-item">
      <a class="nav-link" href="#"data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-table"></i>
        <span>Logout</span></a>
    </li>
  </form>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>