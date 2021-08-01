@extends('borrower.app', ['jumbotron' => 'Detail Riwayat'])


@section('body')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Jumlah Pinjaman termasuk bunga</label>    
                    <p> <strong>
                        Rp.{{ number_format($nominal, 2, ',', '.') }}
                    </strong>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Biaya Asuransi</label>
                    <p>
                        <strong>
                            Rp.{{ number_format($asuransi, 2, ',', '.') }}
                        </strong>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Rencana Pembayaran</label>
                    <p> 
                        <strong>
                            Rp.{{ number_format(($operational), 2, ',', '.').' x '.$jangka_waktu }}
                        </strong>
                    </p>
                </div>
          
                <hr>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Kode Pinjaman</div>
                    <p>
                        
                        {{$kode_pinjaman}}
                    </p>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Waktu Pengajuan</div>
                    <p>
                        
                        {{$tanggal_pengajuan}}
                    </p>
                </div>
            </div> 
        </div>     
    </div>
</div>
@endsection