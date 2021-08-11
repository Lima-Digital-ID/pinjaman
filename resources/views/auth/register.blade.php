@extends('auth.app', ['title' => 'Daftar'])

@section('body')
<div class="bg-left">
    <img src="/img/bg-left.jpg" alt="">
</div>
<div class="bg-right">
    <div class="container">
        <div class="row justify-content-end">

            <div class="col-md-12 col-sm-12 col-xl-10 p-4 shadow-sm" style="margin-top: 120px; background-color:#ffffff;">
                <img src="{{asset('img/logo.jpg')}}" alt="" width="50vh" class="mb-4">

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{route('api.register')}}" method="POST" autocomplete="off">
                    <h2 style="color: black">{{ __('register.register-form')}}</h2>
                    <small>{{ __('register.desc-small')}}</small>
                    @csrf
                    <div class="form-group mt-2">
                        <label for="">{{ __('register.nama-lengkap')}}</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No.Handphone</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary-login w-100 mt-4">{{__('register.btn-register')}}</button>
                </form>
                {{-- <small>{{__('register.desc-small-footer')}} <a href="{{ route('login')}}">{{__('register.login')}}</a></small> --}}
            </div>
        </div>
    </div>
</div>
@endsection