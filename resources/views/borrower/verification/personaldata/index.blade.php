@extends('borrower.app', ['jumbotron' => 'Data Diri'])

@section('body')

@if (\Session::get('is_verified') == 1)
<div class="alert alert-success" role="alert">
  <strong>Informasi!</strong> Verifikasi data anda telah diterima.
</div>
@endif

@if (\Session::get('is_verified') == 2)
<div class="alert alert-info" role="alert">
  <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3 hari.
</div>
@endif

@if (\Session::get('is_verified') == 0 || \Session::get('is_verified') == 3)

@if (\Session::get('is_verified') == 3)
<div class="alert alert-danger" role="alert">
  <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi dan mengirim ulang data.
</div>
@endif

  @include('borrower.verification.personalData.partials.tabs')
<form action="{{ route('personal.store-data') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="tab-content" id="pills-tabContent">
  

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

