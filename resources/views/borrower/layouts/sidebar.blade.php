<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon pl-3 pt-4">
        {{-- <i class="fas fa-money-check"></i> --}}
        <img src="{{asset('img/logo.jpg')}}" alt="" width="50vh" class="mb-4" class="icon-logo">

      </div>
      <div class="sidebar-brand-text mx-3">BPR Apps </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
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
    <li class="nav-item {{ str_contains(Request::segment(1), 'pinjaman') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-hands-helping"></i>
        <span>{{__('sidebar.loan')}}</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('sidebar.type-loan')}}</h6>
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
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ str_contains(Request::segment(1), 'data-diri') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedData" aria-expanded="true" aria-controls="collapsedData">
        <i class="fas fa-fw fa-user"></i>
        <span>{{__('sidebar.completeness-of-data')}}</span>
      </a>
      <div id="collapsedData" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Verivikasi data</h6>
          <a class="collapse-item" href="{{ route('personal.data') }}">{{__('sidebar.personal-data')}}</a>
          <a class="collapse-item" href="{{ route('scoring') }}">{{__('sidebar.more-data')}}</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item {{ Request::segment(1) == 'profile' || Request::segment(1) == 'riwayat' || Request::segment(1) == 'tagihan'  ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>{{__('sidebar.settings')}}</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{__('sidebar.profile-coplete')}}</h6>
          <a class="collapse-item" href="{{ route('edit.profile') }}">{{__('sidebar.profile')}}</a>
          <a class="collapse-item" href="{{ route('riwayat') }}">{{__('sidebar.loan-application-history')}}</a>
          <a class="collapse-item" href="{{ route('tagihan') }}">{{__('sidebar.bill')}}</a>
        </div>
      </div>
    </li>

    <li class="nav-item {{ Request::segment(1) == 'kebijakan-privasi' ? 'active' : '' }} ">
      <a class="nav-link" href="{{route('kebijakan.privasi')}}">
        <i class="fas fa-book"></i>
        <span>{{__('sidebar.policy-&-privacy')}}</span></a>
    </li>

  <form method="POST" action="#">
    <li class="nav-item">
      <a class="nav-link" href="#"data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
        <span>{{__('sidebar.logout')}}</span></a>
    </li>
  </form>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>