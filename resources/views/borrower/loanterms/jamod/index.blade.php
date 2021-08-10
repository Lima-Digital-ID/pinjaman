@extends('borrower.app', ['jumbotron' => 'Syarat Pinjaman Modal'])

@section('body')
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
                <label for="" class="">@lang('syarat-jamod.npwp-attachment')</label>
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

@endsection