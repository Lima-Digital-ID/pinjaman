@extends('borrower.app', ['jumbotron' => 'Scoring'])

@section('body')

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($kategori['data'] as $key => $item)
            <li class="nav-item" role="presentation">
              <a 
                class="nav-link {{ $key == 0 ? 'active' : '' }}"
                id="{{ 'pills-'.$item['id'].'-tab' }}"
                data-toggle="pill" href="{{ '#pills-'.$item['id'] }}"
                role="tab"
                aria-controls="{{ 'pills-'.str_replace(' ', '-', strtolower($item['nama_kategori'])) }}"
                aria-selected="true">
                {{ ucwords($item['nama_kategori']) }}
              </a>
            </li>
            @endforeach
        </ul>
        <form action="#" method="POST">
          <div class="tab-content" id="pills-tabContent">
        
                @foreach ($kategori['data'] as $key => $item)
                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ 'pills-'.$item['id'] }}" role="tabpanel" >
                    @foreach ($item['kriteria'] as $i => $items)
                    <div class="form-group row">
                        <label for="" class="col-md-2">{{$items['nama_kriteria']}}</label>
                        <div class="col-md-4">
                            @foreach ($items['option'] as $o => $options)
                            <input
                                type="radio"
                                name="{{ \Str::slug($items['nama_kriteria']) }}"
                                id="{{ $options['id'] }}"
                                value="{{ $options['id'] }}"> 
                                <label for="{{ $options['id'] }}">{{ $options['option'] }}</label> <br>
                            @endforeach
                        </div>
                    </div>                
                    @endforeach
                </div>
                @endforeach        
                {{-- button --}}
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

@endsection