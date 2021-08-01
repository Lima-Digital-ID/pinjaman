@extends('borrower.app', ['jumbotron' => 'Tagihan'])

@push('stylesheet')
    <style>
        .active {
            color: white;
            background-color: #DC464F;
        }
        .active .st-title{
            color:white;
        }
        .card {
            cursor: pointer;
        }
        .st-title{
            color: #DC464F;
        }

    </style>
@endpush

@section('body')
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <span for="">Termin ke :</span>
                        <br>
                        <b>
                            {{$cicilan_ke}}
                        </b>
                        <br><br>
                        <span for="">Nominal yang harus dibayar :</span>    
                        <br>
                        <b>
                            Rp.{{ number_format($nominal, 2, ',', '.') }}
                        </b>
                        <hr>
                        @include('borrower.tagihan.partials.metode-card')
                    </div>    
                </div>     
            </div>
        </div>
    {{-- </div> --}}
@endsection

{{-- @push('script')
    <script>
        $('.termin-1').click(function(){
            $(".active").removeClass("active");
            $('#selected').val(1);
            $(this).addClass("active");
        });
        $('.termin-2').click(function(){
            $(".active").removeClass("active");
            $('#selected').val(2);
            $(this).addClass("active");
        });
        $('.termin-3').click(function(){
            $(".active").removeClass("active");
            $('#selected').val(3);
            $(this).addClass("active");
        });
    </script>
@endpush --}}