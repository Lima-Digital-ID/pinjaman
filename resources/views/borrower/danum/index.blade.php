
@extends('borrower.app', ['jumbotron' => 'Dana umroh'])

@section('body')

@if (\Session::get('syarat_pinjaman_umroh') == 0)
<form action="{{ route('api.syarat.danum') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="" class="col-md-2">File Suket Travel/KBIH</label>
        <input type="file" name="suket" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Selfie Usaha</label>
        <input type="file" name="selfie" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File SIUP</label>
        <input type="file" name="siup" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File NIB</label>
        <input type="file" name="nib" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Scan Jaminan</label>
        <input type="file" name="jaminan" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File NPWP Usaha</label>
        <input type="file" name="npwp" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Akta Usaha</label>
        <input type="file" name="akta" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Domisili</label>
        <input type="file" name="domisili" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Laporan Keuangan 3 Bulan Terakhir</label>
        <input type="file" name="keuangan" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <div class="col-md-2"></div>
        <div class="col-md-4 d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Kirim" />
        </div>
    </div>
</form>
@elseif(\Session::get('syarat_pinjaman_umroh') == 2)
<div class="alert alert-info" role="alert">
    <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3 hari.
</div>
@elseif(\Session::get('syarat_pinjaman_umroh') == 3)
<div class="alert alert-danger" role="alert">
    <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.
</div>
@elseif(\Session::get('syarat_pinjaman_umroh') == 1)
<p>
    {{__('danum.desc')}}
</p>
<form action="{{route('api.pinjaman.umroh')}}" method="POST" autocomplete="off">
    @csrf
<div class="row">
        <div class="col-xl-6">
            <strong>{{__('danum.with-this')}} :</strong>
                <table>
                <tr>
                    <td> {{__('danum.name')}} </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td> {{__('danum.type-loan')}} </td>
                    <td>: Dana Haji/Umroh</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for=""> {{__('danum.pending')}} :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for=""> {{__('danum.apply')}} (Rp.)</label>
                                <input type="number" placeholder="Rp." name="nominal" class="form-control @error('nominal') is-invalid @enderror">
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
        </div>        
    </div>
</form>
@endif

@endsection