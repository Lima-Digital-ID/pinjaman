@extends('auth.app')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 180px;">
            <div class="col-md-6">
                <form action="{{route('api.register')}}" method="POST" autocomplete="on">
                    <h4>Form Daftar</h4>
                    <small>Silahkan daftarkan akun anda</small>
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">No.Handphone</label>
                        <input type="number" class="form-control" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Passoword</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
                <small>Anda telah memiliki akun? silahkan <a href="{{ route('login')}}">login</a></small>
            </div>
        </div>
    </div>
@endsection