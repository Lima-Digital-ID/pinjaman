@extends('auth.app', ['title' => 'Masuk'])

@section('body')
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <div class="row justify-content-center" style="margin-top: 170px">
            <div class="col-md-8 col-sm-10 col-xl-6 p-4 shadow-sm">
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
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-danger">Login</button>
                </form>
                
                <small>Anda belum meiliki akun? silahkan daftar <a href="{{route('register')}}">disini</a></small>
            </div>
        </div>
    </div>
@endsection