@extends('auth.app', ['title' => 'Masuk'])

@section('body')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 120px">

            {{-- <img src="{{asset('img/logo.jpg')}}" alt="" width="400vh"> --}}

            <div class="col-md-8 col-sm-10 col-xl-6 p-4 shadow-sm">
                <img src="{{asset('img/logo.jpg')}}" alt="" width="50vh" class="mb-4">
                {{-- Session --}}
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


                <form action="{{route('api.login')}}" method="POST" autocomplete="on">
                    @csrf
                    <h4>{{ __('login.welcome')}}</h4>
                    <small>{{ __('login.desc-small')}}</small>
                    <br><br>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                        @error('email')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger">{{ __('login.btn-login')}}</button>
                </form>
                
                <small>{{ __('login.desc-small-footer')}} <a href="{{route('register')}}">{{__('login.here')}}</a></small>
            </div>
        </div>
    </div>
@endsection