@extends('borrower.app', ['jumbotron' => 'Dashboard'])

@section('body')
<div class="row">
    <div class="col-xl-12 col-md-12">
        @if (\Session::get('is_verified') == 0)
        <div class="alert alert-warning" role="alert">
            <strong>Peringatan!</strong> Akun anda belum lengkap, silahkan klik <a href="{{ route('personal.data') }}" class="alert-link"> disini.</a> Untuk melengkapi data diri anda
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $limit != null ? 'Rp.'.number_format($limit, 2, ',', '.') : 'Rp.0,00' }}</div>
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
</div>
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
<div class="row">
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
</div>
@endsection