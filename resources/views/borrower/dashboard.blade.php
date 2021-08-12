@extends('borrower.app', ['jumbotron' => 'Dashboard'])

@section('body')
<div class="row">
    <div class="col-xl-12 col-md-12">
        @if (\Session::get('is_verified') == 0)
        <div class="alert alert-warning" role="alert">
            <strong>Peringatan!</strong> Akun anda belum lengkap, silahkan klik <a href="{{ route('personal.data') }}" class="alert-link text-uppercase" style="color:blue;"> disini.</a> Untuk melengkapi data diri anda
        </div>
        @elseif (\Session::get('is_verified') == 2)
        <div class="alert alert-info" role="alert">
            <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3 hari.
        </div>
        @elseif (\Session::get('is_verified') == 3)
        <div class="alert alert-danger" role="alert">
            <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.
        </div>
        @else
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body text-center">
                        <img src="https://img.icons8.com/color/50/000000/qibla-direction.png"/> <br>
                        <p><strong>Pinjaman Umroh</strong> <br>
                            {{-- @php
                                {{dd(Session::get('kelengkapan_data'));}}
                            @endphp --}}
                        {{-- <small>Limit Pinjaman :  </small> </p> --}}
                        @if ($syarat_umroh == 1)
                            <a href=" {{route('pinjaman.umroh')}} " class="btn btn-primary">
                                Ajukan
                            </a>
                        @endif

                        @if($syarat_umroh == 2 )
                            <p class="text-info">Persyaratan anda telah di cek</p>
                        @endif

                        @if($syarat_umroh != 1 && $syarat_umroh != 2)
                        <a href=" {{route('pinjaman.umroh')}} " class="btn btn-primary ">
                            Upload Persyaratan
                        </a>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body text-center">
                        <img src="https://img.icons8.com/fluency/50/000000/mortgage.png"/> <br>
                        @if (\Session::get('is_verified') == 1)
                        <p><strong>Pinjaman Cepat</strong> <br>
                        <small>Limit Pinjaman : 
                                Rp.{{number_format($limit, 2, ',', '.')}}
                         </small></p>
                        <a href=" {{route('pinjaman.cepat')}} " class="btn btn-primary">
                            Ajukan
                        </a>
                        @else
                        <strong>Pinjaman Cepat</strong> <br>
                            <p>Silahkan lengkapi data terlebih dahulu</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex" class="card-pinjaman">
                <div class="card flex-fill">
                    <div class="card-body text-center">
                        <img src="https://img.icons8.com/plasticine/50/000000/sort-window.png"/> <br>
                        <p><strong>Pinjaman Modal</strong> <br>

                        @if ($kelengkapan_data == 1)
                        <a href=" {{route('pinjaman.modal')}} " class="btn btn-primary">
                            Ajukan
                        </a>
                        @endif

                        @if($kelengkapan_data == 2)
                            <p class="text-info">Persyaratan anda telah di cek</p>
                        @endif

                        @if($kelengkapan_data != 1 && $kelengkapan_data != 2)
                        <a href=" {{route('pinjaman.modal')}} " class="btn btn-primary">
                            Upload Persyaratan
                        </a>

                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">History Pinjaman Anda</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="riwayatTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{__('riwayat.type-loan')}}</th>
                                        <th class="text-center">{{__('riwayat.nominal')}}</th>
                                        <th class="text-center">{{__('riwayat.term')}}</th>
                                        <th class="text-center">{{__('riwayat.date-of-filling')}}</th>
                                        <th class="text-center">{{__('riwayat.loan-status')}}</th>
                                        <th class="text-center"> {{__('riwayat.action')}} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat['data'] as $key => $item)
                                    
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ ucwords($item['id_jenis_pinjaman']) }}</td>
                                        <td class="text-right">{{ 'Rp.'.number_format($item['nominal'], 2, '.', ',') }}</td>
                                        <td class="text-center">{{ $item['jangka_waktu'] }} bulan</td>
                                        <td class="text-center">{{ $item['tanggal_pengajuan'] }}</td>
                                        <td class="text-center">{{ ucwords($item['status']) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('api.riwayat.detail', $item['id']) }}" class="btn btn-info mr-2" title="Detail" data-toggle="tooltip">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Operasi Pinjaman</h6>
            </div>
            <div class="card-body">
                {{-- <div class="card border-left-primary  h-100 py-2 mb-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nominal Awal Pinjaman</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp.'.number_format($temp_limit > 0 ? $temp_limit : $limit, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div> --}}
                <div class="card border-left-info  h-100 py-2 mb-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pinjaman belum dibayar</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp.'.number_format($sisa_pinjaman, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card border-left-success  h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pinjaman telah dibayar</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp.'.number_format($sisa_pinjaman, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
            </div>
            <div class="card-body">
                <img src="{{\Config::get('api_config.domain').\Session::get('foto_profil')}}" width="150" height="150">
                <button class="btn btn-({{\Session::get('is_verified')}} == 0 ) ? danger : success"></button>
                <table>
                    <tr>
                        <td>{{\Session::get('nama')}}</td>
                    </tr>
                    <tr>
                        <td>{{\Session::get('tempat_lahir')}}/{{\Session::get('tanggal_lahir')}}</td>
                    </tr>
                    <tr>
                        <td>{{\Session::get('alamat')}}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer justify-content-between">
                <a href=" {{route('edit.profile')}} " class="btn btn-warning mb-2">
                Edit Profil</a>
                <a href="{{ route('tagihan') }}" class="btn btn-primary">
                    Cek Tagihan anda
                </a>
            </div>
        </div>

    </div>
</div>
{{-- <div class="row">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{__('dashboard.initial-loan-nominal')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp.'.number_format($temp_limit, 2, ',', '.') }}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{__('dashboard.loan-limit')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $limit != null && \Session::get('is_verified') == 1 ? 'Rp.'.number_format($limit, 2, ',', '.') : 'Rp.0,00' }}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{__('dashboard.unpaid-loan')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hutang != null ? 'Rp.'.number_format($hutang, 2, ',', '.') : 'Rp.0,00' }}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
</div> --}}
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
@endphp
{{-- <div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card p-4">
            <h3>{{__('dashboard.loan')}}</h3>
            <div class="row">
                @foreach ($jenisPinjaman['data'] as $i => $item)
                <div class="col-md-4">
                    <a href="{{ $item['id'] == 1 ? route('pinjaman.umroh') : ($item['id'] == 2 ? route('pinjaman.cepat') : route('pinjaman.modal')) }}" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ ucwords($item['jenis_pinjaman']) }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('script')
  <script src="borrower/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="borrower/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#riwayatTable').DataTable();
    });
  </script>
@endpush