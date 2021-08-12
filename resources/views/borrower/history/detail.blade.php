@extends('borrower.app', ['jumbotron' => ''])


@section('body')
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Riwayat</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for=""> {{__('detail-riwayat.loan-amount')}} </label>    
                    <p> <strong>
                        Rp.{{ number_format($nominal, 2, ',', '.') }}
                    </strong>
                    </p>
                </div>
                @php
                    $bunga = $nominal * 9 / 109;
                    $danaCair = $nominal - $bunga - $asuransi;
                @endphp
                <div class="form-group">
                    <label for=""> {{__('detail-riwayat.funds')}} </label>    
                    <p> <strong>
                        Rp.{{ number_format($danaCair, 2, ',', '.') }}
                    </strong>
                    </p>
                </div>

                <div class="form-group">
                    <label for=""> {{__('detail-riwayat.insurance-fee')}} </label>
                    <p>
                        <strong>
                            Rp.{{ number_format($asuransi, 2, ',', '.') }}
                        </strong>
                    </p>
                </div>

                <div class="form-group">
                    <label for=""> {{__('detail-riwayat.payment-plan')}} </label>
                    <p> 
                        <strong>
                            Rp.{{ number_format(($operational), 2, ',', '.').' x '.$jangka_waktu }}
                        </strong>
                    </p>
                </div>
          
                <hr>
                <div class="form-group d-flex justify-content-between">
                    <div class="label"> {{__('detail-riwayat.loan-kode')}} </div>
                    <p>
                        
                        {{$kode_pinjaman}}
                    </p>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="label"> {{__('detail-riwayat.submission-time')}} </div>
                    <p>
                        
                        {{$tanggal_pengajuan}}
                    </p>
                </div>
                <a href="{{route('riwayat')}}" class="btn btn-outline-primary">Kembali</a>
            </div> 
        </div>     
    </div>
@endsection