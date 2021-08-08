@extends('borrower.app', ['jumbotron' => 'Update Profile'])

@section('body')
<form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Upload Images</label>
                @if($data->foto_profil != null)
                <br>
                <img class="mb-2" src="{{ \Config::get('api_config.domain').$data->foto_profil }}" alt="{{ $data->nama }}" width="100" height="100">
                @endif
                <input type="file" class="form-control" name="foto_profile" value="{{\Session::get('foto_profile')}}">
            </div>
            <div class="form-group">
                <label for="">{{__('update-profile.full-name')}}</label>
                <input type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama', $data->nama) }}">
                @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="">{{__('update-profile.date-of-birth')}}</label>
                <input type="date" class="form-control {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}">
                @if ($errors->has('tanggal_lahir'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for=""> {{__('update-profile.place-of-birth')}} </label>
                <input type="text" class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" name="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}">
                @if ($errors->has('tempat_lahir'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for=""> {{__('update-profile.address')}} </label>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}">{{ old('tempat_lahir', $data->alamat) }}</textarea>
                @if ($errors->has('alamat'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <p></p>
                <button class="btn btn-dark">{{__('update-profile.btn')}}</button>
            </div>
        </div>
    </div>
</form>
@endsection