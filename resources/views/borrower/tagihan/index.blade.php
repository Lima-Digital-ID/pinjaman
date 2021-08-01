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
                                <span for="">Kode Pinjaman</span>
                                <br>
                                <b>
                                    {{$data[0]->kode_pinjaman}}
                                </b>
                                <br><br>
                                <span for="">Jumlah Pinjaman termasuk bunga</span>    
                                <br>
                                <b>
                                    Rp.{{ number_format($data[0]->nominal, 2, ',', '.') }}
                                </b>
                                <br><br>
                                <span for="">Biaya Asuransi</span>
                                <br>
                                <b>
                                    Rp.{{ number_format($asuransi, 2, ',', '.') }}
                                </b>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <span for="">Tanggal Pengajuan</span>
                                <br>
                                <b>
                                    {{$data[0]->tanggal_pengajuan}}
                                </b>
                                <br><br>
                                <span for="">Tanggal Diterima</span>
                                <br>
                                <b>
                                    {{$data[0]->tanggal_diterima}}
                                </b>
                                <br><br>
                                <span for="">Jangka Waktu Pengembalian</span>
                                <br>
                                <b>
                                    {{$data[0]->jangka_waktu}} Bulan
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