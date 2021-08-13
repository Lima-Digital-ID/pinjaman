@extends('borrower.app', ['jumbotron' => 'Detail Pinjaman Modal'])

@section('body')
{{-- <div class="row"> --}}
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Jumlah Pinjaman termasuk bunga</label>    
                    <p> <strong>
                        Rp.{{ number_format($data[0]->nominal, 2, ',', '.') }}
                    </strong>
                    </p>
                </div>
                
                <div class="form-group">
                    <label for="">Jumlah Dana yang dicairkan</label>    
                    <p> <strong>
                        Rp.{{ number_format($nominal - $asuransi, 2, ',', '.') }}
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
                            Rp.{{ number_format(($data[0]->nominal / $data[0]->jangka_waktu), 2, ',', '.').' x '.$data[0]->jangka_waktu }}
                        </strong>
                    </p>
                </div>
          
                <hr>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Kode Pinjaman</div>
                    <p>
                        
                        {{$data[0]->kode_pinjaman}}
                    </p>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Waktu Pengajuan</div>
                    <p>
                        
                        {{$data[0]->tanggal_pengajuan}}
                    </p>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Bank</div>
                    <p>
                        
                        {{$data[0]->nama_bank}}
                    </p>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="label">Rekening Bank</div>
                    <p>
                        
                        {{$data[0]->no_rekening}}
                    </p>
                </div>
                <a href="{{route('dashboard')}}" class="btn btn-outline-primary">Kembali ke dashboard</a>
            </div>    
        </div>     
    </div>
{{-- </div> --}}
@endsection