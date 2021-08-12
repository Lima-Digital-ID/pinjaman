@extends('borrower.app', ['jumbotron' => ''])

@section('body')

@if (\Session::get('is_verified') == 1)
<div class="alert alert-success" role="alert">
  <strong> @lang('alert.information') </strong> @lang('alert.info-acc')
</div>
@endif

@if (\Session::get('is_verified') == 2)
<div class="alert alert-info" role="alert">
  <strong>@lang('alert.information')</strong> @lang('alert.info-pending')
</div>
@endif

@if (\Session::get('is_verified') == 0 || \Session::get('is_verified') == 3)

@if (\Session::get('is_verified') == 3)
<div class="alert alert-danger" role="alert">
  <strong>@lang('alert.warning')</strong> @lang('alert.info-reject')
</div>
@endif

  @include('borrower.verification.personalData.partials.tabs')

<form action="{{ route('personal.store-data') }}" method="POST" enctype="multipart/form-data">
  <div class="tab-content" id="pills-tabContent">
  
      @csrf

        {{-- pills ktp --}}
        @include('borrower.verification.personalData.utilities.pillsKTP')

        {{-- pills bank --}}
        @include('borrower.verification.personalData.utilities.pillsBank')

        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsWork')

        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsContact')
        

      </div>
  </form>
@endif
@endsection

