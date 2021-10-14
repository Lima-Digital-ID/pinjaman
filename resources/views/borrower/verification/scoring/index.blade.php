@extends('borrower.app', ['jumbotron' => '']) 
@push('stylesheet')
<link href="{{ asset('assets/vendor/form-wizard/scoring.css') }}" rel="stylesheet"> 
@endpush @section('body') 
@if (\Session::get('score') > 0 && \Session::get('is_verified') == 1) <div class="col-md-10">
  <div class="accordion" id="accordionExample"> @foreach ($kategori['data'] as $key => $item) <div class="card mt-2">
      <div class="card-header" id="heading{{ $item['id'] }}">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $item['id'] }}" aria-expanded="true" aria-controls="collapse{{ $item['id'] }}">
            {{ $item['nama_kategori'] }}
        </h2>
      </div>
      <div id="collapse{{ $item['id'] }}" class="collapse" aria-labelledby="heading{{ $item['id'] }}" data-parent="#accordionExample">
        <div class="card-body"> @foreach ($item['kriteria'] as $i => $kriteria) <div class="col-md-5">
            <div class="form-group">
              <label for="">
                <strong> {{ $kriteria['nama_kriteria'] }} </strong>
              </label> @foreach ($kriteria['option'] as $o => $options) {{ in_array($options['id'], array_column($get_score['data'], 'id_option')) ? $options['option'] : '' }} @endforeach
            </div>
          </div>
          <div class="col-md-6"></div> @endforeach
        </div>
      </div>
    </div> @endforeach </div>
</div> @endif @if (\Session::get('is_verified') == 2 && \Session::get('score') > 0) <div class="alert alert-info" role="alert">
  <strong>Informasi!</strong> Verifikasi data anda sedang di proses. Verifikasi membutuhkan waktu sekitar 2-3 hari.
</div> @endif {{-- @if ((\Session::get('is_verified') == 0 && \Session::get('score') == 0) || (\Session::get('is_verified') == 1 && \Session::get('score') == 0))
    @endif --}} @if (\Session::get('is_verified') == 3 && \Session::get('score') > 0) <div class="alert alert-danger" role="alert">
  <strong>Peringatan!</strong> Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.
</div> @endif @if ((\Session::get('is_verified') == 2 && \Session::get('score') == 0)) <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">
  <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
    <h2>
      <strong>Data Lainnya</strong>
    </h2>
    <p>Isi semua form untuk melanjutkan ke tahap selanjutnya</p>
    <div class="row">
      <div class="col-md-12 mx-0">
        <ul id="progressbar" class="nav nav-pills">
            @foreach ($kategori['data'] as $key => $item)
            <li id="{{$item['nama_kategori']}}" class="nav-link active">
                <strong>{{$item['nama_kategori']}}</strong>
            </li>
          @endforeach
        </ul>
        <!-- progressbar -->
        {{-- fieldsets --}}
        <form action="{{ route('proses-skoring') }}" method="POST" id="msform">
          @csrf 
            @foreach ($kategori['data'] as $key => $item)
            <fieldset>
                <div class="form-card">
                    @foreach ($item['kriteria'] as $i => $items)
                        @if ($items['nama_kriteria'] != 'Debt to Equity Ratio' && $items['nama_kriteria'] != 'ROA (Return on Asset)' && $items['nama_kriteria'] != 'ROE (Return on Equity)')
                        <div class="form-row">
                            <div class="col-md-6">
                            <b for="" class="col-md-4">{{ $items['nama_kriteria'] }}</b>
                            <br>
                            
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column mb-4"> 
                                    @foreach ($items['option'] as $o => $options)
                                    <div class="custom-control custom-radio d-flex items-align-start">
                                    <input type="radio" id="{{ $options['id'] }}" name="{{ \Str::slug($items['nama_kriteria']) }}" class="custom-control-input 
                                                                        @error(\Str::slug($items['nama_kriteria'])) is-invalid @enderror" value="{{ $options['id'].'-'.$options['skor'] }}">
                                    <label class="custom-control-label" for="{{ $options['id'] }}">{{ $options['option'] }}</label>
                                    </div> @error(\Str::slug($items['nama_kriteria'])) <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span> @enderror
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        
                        @endforeach
                      </div>
                      {{-- <input type="button" name="next" class="next action-button" onclick="checkButton()" value="Selanjutnya" /> --}}
                      <input type="button" name="previous" class="previous action-button-previous d-none" id="previous"
                      value="Kembali" />
                      <input type="submit" class="selanjutnya-{{$item['id']}} action-button" value="Selanjutnya" />
            </fieldset>
            @endforeach
        </form>
        <!-- fieldsets -->
        </form>
      </div>
    </div>
  </div>
</div> @endif @endsection @push('script') 
<script src="{{ asset('assets/vendor/form-wizard/checkbutton.js') }}"></script>
<script src="{{ asset('assets/vendor/form-wizard/scoring.js') }}"></script> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush