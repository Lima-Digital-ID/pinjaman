@extends('borrower.app',['jumbotron' => 'Pinjaman Cepat'])

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
    <p>
        Sebuah Pinjaman nasabah untuk keperluan apapun yang bisa di akses secara cepat mudah dan tanpa agunan
    </p>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <div class="row">
        <div class="col-xl-6">
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Pinjaman Cepat</td>
                </tr>
                <tr>
                    <td>Total Pinjaman</td>
                    <td>: {{ $limit_pinjaman }}</td>
                </tr>
                </table>
                <br>
                <label for="">Jangka waktu pengembalian :</label>
                <form action="{{route('api.pinjaman.cepat')}}" method="POST">
                    @csrf
                    <input type="hidden" name="selected" id="selected">
                    @include('borrower.jacep.partials.card')
                    <div class="d-flex justify-content-end mb-4 mt-4">
                        <button class="btn btn-danger mt-2 ">Selanjutnya</button>
                    </div>
                </form>
        </div>
    </div>

@endsection

@push('script')
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
@endpush