@extends('borrower.app',['jumbotron' => ''])

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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pinjaman cepat</h6>
    </div>
    <div class="card-body">
        <p>
            {{__('jacep-index.desc-small')}}
        </p>

        <div class="row">
            <div class="col-xl-12">
                <strong>{{__('jacep-index.dengan-ini')}} :</strong>
                    <table>
                    <tr>
                        <td>{{__('jacep-index.nama')}} </td>
                        <td>: {{ \Session::get('nama') }}</td>
                    </tr>
                    <tr>
                        <td>{{__('jacep-index.type-loan')}}</td>
                        <td>: Pinjaman Cepat</td>
                    </tr>
                    <tr>
                        <td>{{__('jacep-index.total-loan')}}</td>
                        <input type="hidden" name="limit_pinjaman" id="limit_pinjaman" value="{{$limit_pinjaman}}">
                        <td>: Rp.{{ $limit_pinjaman != 0 || $limit_pinjaman != null ? number_format($limit_pinjaman, 2, ',', '.') : '0,00' }}</td>
                    </tr>
                    </table>
                    <br> 
                    <form action="{{route('api.pinjaman.cepat')}}" method="POST">
                        @csrf
                    {{--  <div class="form-group">
                        <label for="" class="" >Nominal sesuai keinginan anda</label>
                        <input type="text" class="form-control col-sm-6" name="req_nominal" value="" id="req_nominal" required>
                    </div>  --}}
                    <br>
                    <label for="">{{__('jacep-index.pending')}} :</label>
                        <input type="hidden" name="selected" id="selected">
                        @include('borrower.jacep.partials.card')
                        <div class="d-flex justify-content-end mb-4 mt-4">
                            <button class="btn btn-danger mt-2" id="next">{{__('jacep-index.next')}}</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        
        $(function () {
           
            var limit = document.getElementById('limit_pinjaman').value;

            $('#req_nominal').on("input", function () {
                
                var req_nominal = parseInt(this.value);

                if (req_nominal > limit) {
                    alert("Maaf nominal yang anda masukkan melebihi total pinjaman");
                    $('#req_nominal').val("");
                }
            })

           
            

        })


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

      
        // var req = $('#req_nominal').val();


    </script>
@endpush