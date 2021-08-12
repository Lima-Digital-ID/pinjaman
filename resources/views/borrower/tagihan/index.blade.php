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
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <span for=""> {{__('tagihan.loan-code')}} </span>
                                <br>
                                <b>
                                    {{$data[0]->kode_pinjaman}}
                                </b>
                                <br><br>
                                <span for=""> {{__('tagihan.loan-interest')}} </span>    
                                <br>
                                <b>
                                    Rp.{{ number_format($data[0]->nominal, 2, ',', '.') }}
                                </b>
                                <br><br>
                                <span for=""> {{__('tagihan.insurance-fee')}} </span>
                                <br>
                                <b>
                                    Rp.{{ number_format($asuransi, 2, ',', '.') }}
                                </b>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <span for=""> {{__('tagihan.date-of-filing')}} </span>
                                <br>
                                <b>
                                    {{$data[0]->tanggal_pengajuan}}
                                </b>
                                <br><br>
                                <span for=""> {{__('tagihan.date-of-receipt')}} </span>
                                <br>
                                <b>
                                    {{$data[0]->tanggal_diterima}}
                                </b>
                                <br><br>
                                <span for=""> {{__('tagihan.payback-time')}} </span>
                                <br>
                                <b>
                                    {{$data[0]->jangka_waktu}} {{__('tagihan.month')}}
                                </b>
                            </div>
                        </div>
                        <hr>
                        @php
                            $temp_status = '';   
                        @endphp
                        @forelse ($cicilan as $key => $item)
                        @php
                            if($key == 0) {
                                $temp_status = $item->status;
                            }
                        @endphp
                        @include('borrower.tagihan.partials.card')
                        @php
                            $temp_status = $item->status;
                        @endphp
                        @empty
                            
                        @endforelse
                    </div>    
                </div>     
            </div>
        </div>
    {{-- </div> --}}
@endsection
@push('script')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-lFnEK49zkLgsTBmW">
</script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // alert('<?php echo $snapToken;?>');
        snap.pay('<?php echo $snapToken; ?>');
    });
</script>
@endpush

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