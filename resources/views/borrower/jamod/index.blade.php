@extends('borrower.app', ['jumbotron' => 'Pinjaman Modal'])


@section('body')
@if (\Session::get('kelengkapan_data') == 0)
<form action="{{ route('api.syarat.jamod')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="" class="col-md-2">@lang('syarat-jamod.type-of-residence') :</label>
        <div class="col-md-2">
            <input type="radio" name="tempat_tinggal" value="Rumah Tangga"> @lang('syarat-jamod.household') <br>
            <input type="radio" name="tempat_tinggal" value="Kos"> @lang('syarat-jamod.cost') <br>
            <input type="radio" name="tempat_tinggal" value="Kontrakan"> @lang('syarat-jamod.rent') <br>
            <input type="radio" name="tempat_tinggal" value="Apartemen"> @lang('syarat-jamod.apartement') <br>
            <input type="radio" name="tempat_tinggal" value="Lain-lain"> @lang('syarat-jamod.etc')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.npwp-attachement')</label>
                <input type="file" class="form-control" name="scan_npwp">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.husband-Attachment')</label>
                <input type="file" class="form-control" name="ktp_suami">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.wife-attachment')</label>
                <input type="file" class="form-control" name="ktp_istri">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.marriage-certificate')</label>
                <input type="file" class="form-control" name="surat_nikah">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.BPKB')</label>
                <input type="file" class="form-control" name="bpkb">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.domicile')</label>
                <input type="file" class="form-control" name="domisili_usaha">
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.business-NPWP')</label>
                <input type="file" class="form-control" name="npwp_usaha">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.NIB')</label>
                <input type="file" class="form-control" name="nib">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.notarial')</label>
                <input type="file" class="form-control" name="akta">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.guarantee')</label>
                <input type="file" class="form-control" name="scan_jaminan">
            </div>
            <div class="form-group">
                <label for="" class="">@lang('syarat-jamod.financial')</label>
                <input type="file" class="form-control" name="keuangan">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    @lang('syarat-jamod.btn')
                </button>
            </div>
        </div>
    </div>
</form>

@include('borrower.loanterms.jamod.index')
@elseif(\Session::get('kelengkapan_data') == 2)
<div class="alert alert-info" role="alert">
    <strong> @lang('alert.information') </strong> @lang('alert.info-pending')
</div>
@elseif(\Session::get('kelengkapan_data') == 3)
<div class="alert alert-danger" role="alert">
    <strong>@lang('alert.warning')</strong> @lang('alert.info-reject')
</div>
@elseif(\Session::get('kelengkapan_data') == 1)
    <p>
        @lang('jamod-index.desc')
    </p>

    <div class="row">
        <div class="col-xl-6">
            <form action="{{ route('api.pinjaman.modal')}}" method="POST" autocomplete="off">
                @csrf
            <strong>@lang('jamod-index.with-this') :</strong>
                <table>
                <tr>
                    <td>@lang('jamod-index.name') </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>@lang('jamod-index.type-loan')</td>
                    <td>: Pinjaman Modal</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for="">@lang('jamod-index.pending') :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for="">@lang('jamod-index.apply') (Rp.)</label>
                                <input type="number" placeholder="Rp." class="form-control @error('nominal') is-invalid @enderror" name="nominal">
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
                <button class="btn btn-danger mt-2 ">@lang('jamod-index.btn')</button>
                </div>
            </form>
        </div>
    </div>
@endif
@endsection