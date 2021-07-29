@extends('auth.app')

@section('body')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <form action="{{route('api.login')}}" method="POST">
                    @csrf
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
            </div>
        </div>
    </div>
@endsection