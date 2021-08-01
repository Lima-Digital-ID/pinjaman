@extends('borrower.app', ['jumbotron' => 'Pinjaman Modal'])


@section('body')
@if (\Session::get('kelengkapan_data') == 0)
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

@include('borrower.loanterms.jamod.index')
@elseif(\Session::get('kelengkapan_data') == 2)
<div class="alert alert-info" role="alert">
    <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3 hari.
</div>
@elseif(\Session::get('kelengkapan_data') == 3)
<div class="alert alert-danger" role="alert">
    <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.
</div>
@elseif(\Session::get('kelengkapan_data') == 1)
    <p>
        Fitur Pinjaman memakai agunan untuk pengembangan modal usaha dari 5 juta - 5 milyar dengan jangka waktu 1 tahun sampai dengan 5 tahun.
    </p>

    <div class="row">
        <div class="col-xl-6">
            <form action="{{ route('api.pinjaman.modal')}}" method="POST" autocomplete="off">
                @csrf
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Pinjaman Modal</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for="">Jangka waktu pengembalian :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for="">Ajukan Nomimal Pinjaman (Rp.)</label>
                                <input type="number" placeholder="Rp." class="form-control @error('nominal') is-invalid @enderror" name="nominal">
                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                <button class="btn btn-danger mt-2 ">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
@endif
@endsection