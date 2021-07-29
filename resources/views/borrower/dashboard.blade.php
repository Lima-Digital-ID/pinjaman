@extends('borrower.app', ['jumbotron' => 'Dashboard'])

@section('body')
<div class="row">
    <div class="col-xl-6">
        <div class="alert alert-warning" role="alert">
            <strong>Peringatan!</strong> Akun anda belum lengkap, silahkan klik <a href="#" class="alert-link"> disini.</a> Untuk melengkapi data diri anda
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Limit Pinjaman</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $limit != null ? 'Rp.'.number_format($limit, 2, '.', ',') : 'isNan' }}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pinjaman Belum dibayar</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($hutang, 2, '.', ',') }}</div>
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
    $jenisPinjaman = \Http::withToken('2|q7VZRXQn0XR1SOBxRIizJ3A9ZelzF8ujKtBRBgpf')->get($urlJenis);
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
            <h3>Pinjaman</h3>
            <div class="row">
                @foreach ($jenisPinjaman['data'] as $i => $item)
                <div class="col-md-4">
                    <a href="#" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ ucwords($item['jenis_pinjaman']) }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-md-4">
                    <a href="#" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p>Pinjaman Cepat</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p>Pinjaman Modal</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p>Dana Umroh</p>
                        </div>
                    </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection