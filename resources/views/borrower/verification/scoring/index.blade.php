@extends('borrower.app', ['jumbotron' => 'Scoring'])

@section('body')

@include('borrower.verification.scoring.partials.tabs')
{{-- <form action="" method="POST"> --}}
  <div class="tab-content" id="pills-tabContent">

        {{-- pills ktp --}}
        @include('borrower.verification.scoring.utilities.pillsCharacterAnalysis')
        
        {{-- pills bank --}}
        @include('borrower.verification.scoring.utilities.pillsCapacityAnalysis')
        
        {{-- pills work --}}
        @include('borrower.verification.scoring.utilities.pillRepaymentCapacityAnalysis')  

        {{-- pills work --}}
        @include('borrower.verification.scoring.utilities.pillRepaymentCapacityAnalysis2')  
        
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