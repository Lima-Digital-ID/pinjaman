@extends('borrower.app', ['jumbotron' => 'Syarat Pinjaman Modal'])

@section('body')
<form action="{{ route('api.syarat.jamod')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="" class="col-md-2">Jenis Tempat Tinggal:</label>
        <div class="col-md-2">
            <input type="radio" name="tempat_tinggal" value="Rumah Tangga"> Rumah Tangga <br>
            <input type="radio" name="tempat_tinggal" value="Kos"> Kos <br>
            <input type="radio" name="tempat_tinggal" value="Kontrakan"> Kontrakan <br>
            <input type="radio" name="tempat_tinggal" value="Apartemen"> Apartemen <br>
            <input type="radio" name="tempat_tinggal" value="Lain-lain"> Lain-lain
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="">Lampiran NPWP</label>
                <input type="file" class="form-control" name="scan_npwp">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran KTP Suami</label>
                <input type="file" class="form-control" name="ktp_suami">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran KTP Istri</label>
                <input type="file" class="form-control" name="ktp_istri">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran Surat Nikah</label>
                <input type="file" class="form-control" name="surat_nikah">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran BPKB</label>
                <input type="file" class="form-control" name="bpkb">
            </div>
            <div class="form-group">
                <label for="" class="">Lampiran Domisili Usaha</label>
                <input type="file" class="form-control" name="domisili_usaha">
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="" class="">Lampiran NPWP Usaha</label>
                <input type="file" class="form-control" name="npwp_usaha">
            </div>
            <div class="form-group">
                <label for="" class="">NIB</label>
                <input type="file" class="form-control" name="nib">
            </div>
            <div class="form-group">
                <label for="" class="">Akta Notaris</label>
                <input type="file" class="form-control" name="akta">
            </div>
            <div class="form-group">
                <label for="" class="">Jaminan</label>
                <input type="file" class="form-control" name="scan_jaminan">
            </div>
            <div class="form-group">
                <label for="" class="">Laporan Keuangan 3 bulan terakhir (.pdf)</label>
                <input type="file" class="form-control" name="keuangan">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection