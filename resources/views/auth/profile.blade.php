@extends('borrower.app', ['jumbotron' => 'Update Profile'])

@section('body')
<form action="" method="POST">
    @csrf
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Upload Images</label>
                <input type="file" class="form-control" name="foto_profile" value="{{\Session::get('foto_profile')}}">
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="{{\Session::get('nama')}}">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{\Session::get('tanggal_lahir')}}">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" value="{{\Session::get('tempat_lahir')}}">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{\Session::get('alamat')}}</textarea>
            </div>
            <div class="form-group">
                <p></p>
                <button class="btn btn-dark">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection