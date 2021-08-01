@extends('borrower.app', ['jumbotron' => 'Tagihan'])

@section('body')
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p> <strong>Selamat!</strong> Pembayaran anda berhasil dilakukan.</p>
                        <a href="{{ route('dashboard') }}">
                            <button class="btn btn-primary">
                                Beranda
                            </button>
                        </a>
                    </div>    
                </div>     
            </div>
        </div>
    {{-- </div> --}}
@endsection
