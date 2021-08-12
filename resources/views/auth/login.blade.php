@extends('auth.app', ['title' => 'Masuk'])

@section('body')
<div class="bg-left">
    <img src="/img/bg-left.jpg" alt="">
</div>
<div class="bg-right">
    <div class="container">
        <div class="row justify-content-end">

            <div class="col-md-12 col-sm-12 col-xl-10 p-4 shadow-sm" style="margin-top: 120px; background-color:#ffffff;">
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
                    <h2 style="color: black">{{ __('login.welcome')}}</h2>
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
                        <input type="password" value="123456" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary-login w-100 mb-2">{{ __('login.btn-login')}}</button>
                    <a href="{{route('register')}}" class="btn btn-primary-register w-100 p-2"> @lang('login.btn-register') </a>
                </form>
                
                {{-- <small>{{ __('login.desc-small-footer')}} <a href="{{route('register')}}">{{__('login.here')}}</a></small> --}}
            </div>
        </div>
    </div>
</div>
@endsection