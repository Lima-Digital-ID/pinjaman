@extends('borrower.app', ['jumbotron' => ''])

@push('stylesheet')
    <style>
        /* .link-notif {
            color: black;
            text-decoration: none;
        }
        .link-notif :hover {
            background-color: rgb(199, 189, 189);
            color: black !important;
            text-decoration: none !important;
        }
        .has-read {
            background-color: rgb(155, 151, 151);
            color: black !important;
            text-decoration: none !important;
        } */

    </style>
@endpush

@section('body')

    <div class="col-xl-8 col-md-8">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
            </div>
            <div class="card-body">
            @forelse ($notifikasi as $key => $item)
            <div class="row mb-2">
                <div class="col">
                    <a class="link-notif" @if($item->is_read == 0) href="{{ route('detail-notifikasi', $item->id) }}" @endif>
                        <div class="card {{ $item->is_read == 1 ? 'has-read' : '' }}">
                            <div class="card-body">
                                <strong>{{ $item->title }}</strong>
                                <p>{{ $item->message }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p>belum ada notifikasi.</p>
                        </div>
                    </div>
                </div>                    
            @endforelse
            </div>
        </div>
    </div>

@endsection