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

<div class="col-md-10 mb-2">
  <div class="card">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data diri</h6>
    </div>
      <div class="card-body">
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

    </div>
  </div>
</div>

@endif
@endsection

@push('script')
<script type="text/javascript">
    function validateKtp(){
        var fileName = document.getElementById("scan_ktp").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("scan_ktp").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateSelfie(){
        var fileName = document.getElementById("selfie_ktp").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("selfie_ktp").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
@endpush
