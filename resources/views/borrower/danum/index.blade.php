
@extends('borrower.app', ['jumbotron' => 'Dana umroh'])

@section('body')

@if (\Session::get('syarat_pinjaman_umroh') == 0)
<form action="{{ route('api.syarat.danum') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.kbih')</label>
        <input type="file" name="suket" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.selfie')</label>
        <input type="file" name="selfie" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.SIUP')</label>
        <input type="file" name="siup" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.NIB')</label>
        <input type="file" name="nib" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.scan')</label>
        <input type="file" name="jaminan" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.tin')</label>
        <input type="file" name="npwp" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.deed')</label>
        <input type="file" name="akta" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.domicile')</label>
        <input type="file" name="domisili" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-danum.financial')</label>
        <input type="file" name="keuangan" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <div class="col-md-2"></div>
        <div class="col-md-4 d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="@lang('syarat-danum.btn')" />
        </div>
    </div>
</form>
@elseif(\Session::get('syarat_pinjaman_umroh') == 2)
<div class="alert alert-info" role="alert">
    <strong>@lang('alert.information')</strong> @lang('alert.info-pending')
@elseif(\Session::get('syarat_pinjaman_umroh') == 3)
<div class="alert alert-danger" role="alert">
    <strong>@lang('alert.warning')</strong> @lang('alert.info-reject')
</div>
@elseif(\Session::get('syarat_pinjaman_umroh') == 1)
<p>
    {{__('danum.desc')}}
</p>
<form action="{{route('api.pinjaman.umroh')}}" method="POST" autocomplete="off">
    @csrf
<div class="row">
        <div class="col-xl-6">
            <strong>{{__('danum.with-this')}} :</strong>
                <table>
                <tr>
                    <td> {{__('danum.name')}} </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td> {{__('danum.type-loan')}} </td>
                    <td>: Dana Haji/Umroh</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for=""> {{__('danum.pending')}} :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for=""> {{__('danum.apply')}} (Rp.)</label>
                                <input type="number" placeholder="Rp." name="nominal" class="form-control @error('nominal') is-invalid @enderror">
                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                 @enderror
                            </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                <button class="btn btn-danger mt-2 ">@lang('danum.btn')</button>
                </div>
        </div>        
    </div>
</form>
@endif

@endsection