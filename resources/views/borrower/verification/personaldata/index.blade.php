@extends('borrower.app', ['jumbotron' => 'Data Diri'])

@push('stylesheet')
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

@endpush
@section('body')

  <div id="smartwizard">
  @include('borrower.verification.personalData.partials.tabs')
{{-- <form action="" method="POST"> --}}
  {{-- <div class="tab-content" id="pills-tabContent"> --}}
  
  <div class="tab-content">
      {{-- <div id="step-1" class="tab-pane" role="tabpanel">
         Step content
      </div>
      <div id="step-2" class="tab-pane" role="tabpanel">
         Step content
      </div>
      <div id="step-3" class="tab-pane" role="tabpanel">
         Step content
      </div>
      <div id="step-4" class="tab-pane" role="tabpanel">
         Step content
      </div> --}}
        {{-- pills ktp --}}
        @include('borrower.verification.personalData.utilities.pillsKTP')

        {{-- pills bank --}}
        @include('borrower.verification.personalData.utilities.pillsBank')

        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsWork')

        {{-- pills work --}}
        @include('borrower.verification.personalData.utilities.pillsContact')
        
  </div>

  </div>
    {{-- </div> --}}
{{-- </form> --}}
@endsection

@push('script')
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script>
      $(document).ready(function(){
 
        // SmartWizard initialize
        $('#smartwizard').smartWizard(
        { 
            lang: {
              next: 'Selanjutnya',
              previous: 'Kembali'
            },

          }
        );
      });
    </script>
@endpush
