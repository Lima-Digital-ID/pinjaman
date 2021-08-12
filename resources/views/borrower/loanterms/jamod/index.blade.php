@extends('borrower.app', ['jumbotron' => 'Syarat Pinjaman Modal'])

@section('body')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Syarat Pinjaman Modal</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('api.syarat.jamod')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="" class="col-md-4">@lang('syarat-jamod.type-of-residence') :</label>
                <div class="col-md-8">
                    <input type="radio" name="tempat_tinggal" id="rumah" value="Rumah Tangga" required> <label for="rumah">@lang('syarat-jamod.household')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="kos" value="Kos" required> <label for="kos">@lang('syarat-jamod.cost')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="kontrakan" value="Kontrakan" required> <label for="kontrakan">@lang('syarat-jamod.rent')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="apartemen" value="Apartemen" required> <label for="apartemen">@lang('syarat-jamod.apartement')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="lain" value="Lain-lain" required> <label for="lain">@lang('syarat-jamod.etc')</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.npwp-attachment')</label>
                        <input type="file" class="form-control" name="scan_npwp" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.husband-Attachment')</label>
                        <input type="file" class="form-control" name="ktp_suami" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.wife-attachment')</label>
                        <input type="file" class="form-control" name="ktp_istri" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.marriage-certificate')</label>
                        <input type="file" class="form-control" name="surat_nikah" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.BPKB')</label>
                        <input type="file" class="form-control" name="bpkb" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.domicile')</label>
                        <input type="file" class="form-control" name="domisili_usaha" required>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.business-NPWP')</label>
                        <input type="file" class="form-control" name="npwp_usaha" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.NIB')</label>
                        <input type="file" class="form-control" name="nib" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.notarial')</label>
                        <input type="file" class="form-control" name="akta" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.guarantee')</label>
                        <input type="file" class="form-control" name="scan_jaminan" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.financial')</label>
                        <input type="file" class="form-control" name="keuangan" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    @lang('syarat-jamod.btn')
                </button>
            </div>
        </form>
    </div>
</div>

@endsection