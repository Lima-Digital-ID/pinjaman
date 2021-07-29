@extends('borrower.app', ['jumbotron' => 'Data Diri'])

@section('body')

@include('borrower.verification.personalData.partials.tabs')
{{-- <form action="" method="POST"> --}}
  <div class="tab-content" id="pills-tabContent">

        {{-- pills ktp --}}
        @include('borrower.verification.personalData.utilities.pillsKTP')
        
        {{-- pills bank --}}
        @include('borrower.verification.personalData.utilities.pillsBank')
        
        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsWork')
        
        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsContact')
        

        {{-- button --}}
        <div class="form-group row">
            <div class="col-md-2">
                <button class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </div>
{{-- </form> --}}
@endsection