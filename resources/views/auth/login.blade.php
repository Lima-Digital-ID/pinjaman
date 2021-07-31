@extends('auth.app')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 220px">
            <div class="col-md-6">
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
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                
                <small>Anda belum meiliki akun? silahkan daftar <a href="{{route('register')}}">disini</a></small>
            </div>
        </div>
    </div>
@endsection