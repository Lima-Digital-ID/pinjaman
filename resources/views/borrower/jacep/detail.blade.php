@extends('borrower.app', ['jumbotron' => 'Detail Pinjaman'])

@section('body')
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <label for="">Jumlah Pinjaman termasuk bunga</label>    
                        <br>
                        <b>
                            Rp.1.308.000,00
                        </b>
                        <br>
                        <label for="">Biaya Ansuran</label>
                        <br>
                        <b>
                            Rp.100.000,00
                        </b>
                        <hr>
                        <div class="form-group d-flex justify-content-between">
                            <div class="label">Kode Pinjaman</div>
                            <p>
                                lasdoja
                            </p>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="label">Waktu Pengajuan</div>
                            <p>
                                lasdoja
                            </p>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="label">Bank</div>
                            <p>
                                lasdoja
                            </p>
                        </div>
                    </div>    
                </div>     
            </div>
        </div>
    {{-- </div> --}}
@endsection