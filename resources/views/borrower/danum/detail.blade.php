@extends('borrower.app', ['jumbotron' => 'Detail Dana Umroh'])

@section('body')
    {{-- <div class="container"> --}}
        {{-- <div class="row"> --}}
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <label for="">Jumlah Pinjaman termasuk bunga</label>    
                        <br>
                        <b>
                            Rp.{{ number_format($data[0]->nominal, 2, ',', '.') }}
                        </b>
                        <br><br>
                        <label for="">Jumlah Dana yang dicairkan</label>    
                        <br>
                        <b>
                            Rp.{{ number_format($nominal - $asuransi, 2, ',', '.') }}
                        </b>
                        <br><br>
                        <label for="">Biaya Asuransi</label>
                        <br>
                        <b>
                            Rp.{{ number_format($asuransi, 2, ',', '.') }}
                        </b>
                        <br><br>
                        <label for="">Rencana Pembayaran</label>
                        <br>
                        <b>
                            Rp.{{ number_format(($data[0]->nominal / $data[0]->jangka_waktu), 2, ',', '.').' x '.$data[0]->jangka_waktu }}
                        </b>
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
                                @php
                                    $i = 1;
                                    $encrypt = '*';
                                    while ($i < (strlen($data[0]->no_rekening) - 4)) {
                                        $encrypt .= '*';
                                        $i++;
                                    }
                                    $norek = $encrypt.substr($data[0]->no_rekening, -4);
                                @endphp
                                {{$norek}}
                            </p>
                        </div>
                        <a href="{{route('dashboard')}}" class="btn btn-outline-primary">Kembali ke dashboard</a>
                    </div>    
                </div>     
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
@endsection