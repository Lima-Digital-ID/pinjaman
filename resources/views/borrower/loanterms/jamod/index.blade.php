@extends('borrower.app', ['jumbotron' => 'Syarat Pinjaman Modal'])

@section('body')
    <div class="form-group row">
        <label for="" class="col-md-2">Jenis Tempat Tinggal:</label>
        <div class="col-md-2">
            <input type="radio" name="jtg"> Rumah tangga <br>
            <input type="radio" name="jtg"> Kos <br>
            <input type="radio" name="jtg"> Kontrakan <br>
            <input type="radio" name="jtg"> Apartemen <br>
            <input type="radio" name="jtg"> Lain-lain
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="">Lampiran NPWP</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran KTP Suami</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran KTP Istri</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran Surat Nikah</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran BPKB</label>
                <input type="file" class="form-control ">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="">Lampiran Domisili Usaha</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">NIB</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Surat Domisili</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">Akta Notaris</label>
                <input type="file" class="form-control ">
            </div>
            <div class="form-group">
                <label for="" class="">NPWP Usaha</label>
                <input type="file" class="form-control ">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>

    </div>

@endsection