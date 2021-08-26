@extends('borrower.app', ['jumbotron' => ''])

@push('stylesheet')
    <link href="{{ asset('borrower/vendor/form-wizard/style.css') }}" rel="stylesheet">
@endpush

@section('body')

    @if (\Session::get('score') > 0 && \Session::get('is_verified') == 1)
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                @foreach ($kategori['data'] as $key => $item)
                    <div class="card mt-2">
                        <div class="card-header" id="heading{{ $item['id'] }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse{{ $item['id'] }}" aria-expanded="true"
                                    aria-controls="collapse{{ $item['id'] }}">
                                    {{ $item['nama_kategori'] }}
                            </h2>
                        </div>

                        <div id="collapse{{ $item['id'] }}" class="collapse" aria-labelledby="heading{{ $item['id'] }}"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($item['kriteria'] as $i => $kriteria)
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for=""><strong> {{ $kriteria['nama_kriteria'] }} </strong></label>
                                            @foreach ($kriteria['option'] as $o => $options)
                                            {{ in_array($options['id'], array_column($get_score['data'], 'id_option')) ? $options['option'] : '' }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    @endif

    @if (\Session::get('is_verified') == 2 && \Session::get('score') > 0)
        <div class="alert alert-info" role="alert">
            <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3
            hari.
        </div>
    @endif

    {{-- @if ((\Session::get('is_verified') == 0 && \Session::get('score') == 0) || (\Session::get('is_verified') == 1 && \Session::get('score') == 0))
    @endif --}}
    @if (\Session::get('is_verified') == 3 && \Session::get('score') > 0)
        <div class="alert alert-danger" role="alert">
            <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.
        </div>
    @endif

    @if ((\Session::get('is_verified') == 2 && \Session::get('score') == 0))

    <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <h2><strong>Scoring</strong></h2>
            <p>Isi semua form untuk melanjutkan ke tahap selanjutnya</p>
            <div class="row">
                <div class="col-md-12 mx-0">
                    <form id="msform" action="{{ route('personal.store-data') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul class="nav nav-pills mb-3" id="progressbar" role="tablist">
                            @foreach ($kategori['data'] as $key => $item)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                        id="{{ 'pills-' . $item['id'] . '-tab' }}" data-toggle="pill"
                                        href="{{ '#pills-' . $item['id'] }}" role="tab"
                                        aria-controls="{{ 'pills-' . str_replace(' ', '-', strtolower($item['nama_kategori'])) }}"
                                        aria-selected="true">
                                        {{ ucwords($item['nama_kategori']) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        {{-- fieldsets --}}
                        <form action="{{ route('proses-skoring') }}" method="POST">
                            @csrf
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($kategori['data'] as $key => $item)
                                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                        id="{{ 'pills-' . $item['id'] }}" role="tabpanel">
                                        @foreach ($item['kriteria'] as $i => $items)
                                            @if ($items['nama_kriteria'] != 'Debt to Equity Ratio' && $items['nama_kriteria'] != 'ROA (Return on Asset)' && $items['nama_kriteria'] != 'ROE (Return on Equity)')
                                                <div class="form-group row d-flex">
                                                    <label for="" class="col-md-4">{{ $items['nama_kriteria'] }}</label>
                                                    <div class="col-md-4">
                                                        @foreach ($items['option'] as $o => $options)
                                                            <input type="radio"
                                                                class="form control d-flex align-items-end @error(\Str::slug($items['nama_kriteria'])) is-invalid @enderror"
                                                                style="display: inline-block"
                                                                name="{{ \Str::slug($items['nama_kriteria']) }}"
                                                                id="{{ $options['id'] }}"
                                                                value="{{ $options['id'] . '-' . $options['skor'] }}"
                                                                required>
                                                            <label for="{{ $options['id'] }}">{{ $options['option'] }}</label>
                                                          
                                                            @error(\Str::slug($items['nama_kriteria']))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="form-group row">
                                    {{-- <div class="col-md-2">
                                        <button class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </form>
                        <!-- fieldsets -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-10">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Scoring</h6>
              </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($kategori['data'] as $key => $item)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                id="{{ 'pills-' . $item['id'] . '-tab' }}" data-toggle="pill"
                                href="{{ '#pills-' . $item['id'] }}" role="tab"
                                aria-controls="{{ 'pills-' . str_replace(' ', '-', strtolower($item['nama_kategori'])) }}"
                                aria-selected="true">
                                {{ ucwords($item['nama_kategori']) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <form action="{{ route('proses-skoring') }}" method="POST">
                    @csrf
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($kategori['data'] as $key => $item)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                id="{{ 'pills-' . $item['id'] }}" role="tabpanel">
                                @foreach ($item['kriteria'] as $i => $items)
                                    @if ($items['nama_kriteria'] != 'Debt to Equity Ratio' && $items['nama_kriteria'] != 'ROA (Return on Asset)' && $items['nama_kriteria'] != 'ROE (Return on Equity)')
                                        <div class="form-group row">
                                            <label for="" class="col-md-4">{{ $items['nama_kriteria'] }}</label>
                                            <div class="col-md-5">
                                                @foreach ($items['option'] as $o => $options)
                                                    <input type="radio"
                                                        class="form control @error(\Str::slug($items['nama_kriteria'])) is-invalid @enderror"
                                                        name="{{ \Str::slug($items['nama_kriteria']) }}"
                                                        id="{{ $options['id'] }}"
                                                        value="{{ $options['id'] . '-' . $options['skor'] }}"
                                                        required>
                                                    <label for="{{ $options['id'] }}">{{ $options['option'] }}</label>
                                                    <br>
                                                    <br>
                                                    @error(\Str::slug($items['nama_kriteria']))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        <div class="form-group row">
                            <div class="col-md-2">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    @endif
@endsection

@push('script')
<script src="{{ asset('borrower/vendor/form-wizard/main.js') }}"></script>
@endpush