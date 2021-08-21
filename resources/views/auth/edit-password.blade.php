@extends('borrower.app', ['jumbotron' => ''])

@section('body')

<div class="col-md-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('update-password.edit-password')}}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">{{__('update-password.current-password')}}</label>
                    <input type="password" class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ old('current_password') }}">
                    @if ($errors->has('current_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('current_password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">{{__('update-password.new-password')}}</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for=""> {{__('update-password.confirm-password')}} </label>
                    <input type="password" class="form-control {{ $errors->has('confirmation') ? ' is-invalid' : '' }}" name="confirmation" value="{{ old('confirmation') }}">
                    @if ($errors->has('confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <p></p>
                    <button class="btn btn-primary">{{__('update-password.btn-update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection