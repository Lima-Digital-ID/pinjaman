@extends('auth.app')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 220px">
            <div class="col-md-6">
                <form action="{{route('api.login')}}" method="POST">
                    @csrf
                    <h4>Selamat Datang</h4>
                    <small>Silahkan login menggunakan akun anda</small>
                    <br><br>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Passoword</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                
                <small>Anda belum meiliki akun? silahkan daftar <a href="{{route('register')}}">disini</a></small>
            </div>
        </div>
    </div>
@endsection