
@extends('borrower.app', ['jumbotron' => 'Dana umroh'])

@section('body')

@if (\Session::get('syarat_pinjaman_umroh') == 0)
<div class="form-group row">
    <label for="" class="col-md-2">File Suket Travel/KBIH</label>
    <input type="file" class="form-control col-md-4">
</div>
<div class="form-group row">
    <label for="" class="col-md-2">File Selfie Usaha</label>
    <input type="file" class="form-control col-md-4">
</div>
<div class="form-group row">
    <label for="" class="col-md-2">File SIUP</label>
    <input type="file" class="form-control col-md-4">
</div>
<div class="form-group row">
    <label for="" class="col-md-2">FILE NIB</label>
    <input type="file" class="form-control col-md-4">
</div>
<div class="form-group row">
    <label for="" class="col-md-2">File Scan Jaminan</label>
    <input type="file" class="form-control col-md-4">
</div>
<div class="form-group row">
    <div class="col-md-2"></div>
    <div class="col-md-4 d-flex justify-content-end">
        <button class="btn btn-primary">
            Submit
        </button>
    </div>
</div>
@elseif(\Session::get('syarat_pinjaman_umroh') == 1)
<p>
    Fitur Pinjaman dana talangan umroh dan haji bagi UMKM.
</p>
<form action="{{route('api.pinjaman.umroh')}}" method="POST" autocomplete="off">
    @csrf
<div class="row">
        <div class="col-xl-6">
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Dana Haji/Umroh</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for="">Jangka waktu pengembalian :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for="">Ajukan Nomimal Pinjaman (Rp.)</label>
                                <input type="number" placeholder="Rp." name="nominal" class="form-control">
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