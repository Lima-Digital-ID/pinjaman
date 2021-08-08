<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Lang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if (app()->getLocale() == 'id')
            <a class="dropdown-item" href="{{ url('locale/en') }}">@lang('english')</a>
            <a class="dropdown-item" href="{{  url('locale/id')}}">@lang('indonesia')</a>              
          @endif
          @if (app()->getLocale() == 'en')
            <a class="dropdown-item" href="{{ url('locale/en') }}">@lang('english')</a>
            <a class="dropdown-item" href="{{  url('locale/id')}}">@lang('indonesia')</a>              
          @endif
        </div>
      </li>

      <!-- Nav Item - Alerts -->
      {{-- @php
        $url_notif = \Config::get('api_config.get_new_notification');
        $notifikasi = Http::withToken(\Session::get('token'))
                        ->get($url_notif);

        $eNotif = json_decode($notifikasi, false);

        $notifLength = count($eNotif->data);

      @endphp --}}
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <!-- Counter - Alerts -->
          {{-- <span class="badge badge-danger badge-counter">{{ $notifLength }}</span> --}}
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            {{__('nav.notification')}}
          </h6>
          {{-- @forelse ($eNotif->data as $key => $value)
            <a class="dropdown-item d-flex align-items-center" href="{{ route('detail-notifikasi', $value->id) }}">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">{{ $value->title }}</div>
                <span class="font-weight-bold">{{ $value->message }}</span>
              </div>
            </a>
          @empty
              belum ada notifikasi.
          @endforelse --}}
          <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifikasi') }}">{{__('nav.show-all-notification')}}</a>
        </div>
      </li>
      

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Session::get('nama') }}</span>
          {{-- @if (\Session::get('foto_profil') != null || \Session::get('foto_profil') != '')
          <img class="img-profile rounded-circle" src="{{ \Config::get('api_config.domain').\Session::get('foto_profil') }}">
          @else
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
          @endif --}}
        </a>
        <!-- Dropdown - User Information -->
        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div> --}}
      </li>

    </ul>

  </nav>