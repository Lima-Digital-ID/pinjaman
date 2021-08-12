@extends('borrower.app', ['jumbotron' => ''])


@section('body')
@if (\Session::get('kelengkapan_data') == 0)
@include('borrower.loanterms.jamod.index')

@elseif(\Session::get('kelengkapan_data') == 2)
<div class="alert alert-info" role="alert">
    <strong> @lang('alert.information') </strong> @lang('alert.info-pending')
</div>
@elseif(\Session::get('kelengkapan_data') == 3)
<div class="alert alert-danger" role="alert">
    <strong>@lang('alert.warning')</strong> @lang('alert.info-reject')
</div>
@include('borrower.loanterms.jamod.index')

@elseif(\Session::get('kelengkapan_data') == 1)
<div class="col-xl-6">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pinjaman Modal</h6>
        </div>
        <div class="card-body">
            <p>
                @lang('jamod-index.desc')
            </p>
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
                                    <input type="number" placeholder="Rp." class="form-control @error('nominal') is-invalid @enderror" name="nominal" required>
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
</div>
@endif
@endsection