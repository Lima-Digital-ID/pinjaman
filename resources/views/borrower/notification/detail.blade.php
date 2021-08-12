@extends('borrower.app', ['jumbotron' => ''])

@section('body')
{{-- <div class="row"> --}}
    <div class="col-xl-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="card-body">
                        <h4 class="text-dark">{{ $notifikasi->title }}</h4>
                        <p>{!! str_replace('\n', '<br>', $notifikasi->message) !!}</p>
                    </div>
                </div>
            </div>                
        </div>
    </div>
{{-- </div> --}}
@endsection