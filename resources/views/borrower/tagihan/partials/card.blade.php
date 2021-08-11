
{{-- <form action="{{ route('metode-pembayaran') }}" method="post"> --}}
{{-- @csrf --}}
<div class="card termin-1 mb-2">
    <div class="card-body">
        <input type="hidden" name="id_pelunasan" value="{{ $item->id }}">
        <input type="hidden" name="id_pinjaman" value="{{ $item->id_pinjaman }}">
        <input type="hidden" name="cicilan_ke" value="{{ $item->cicilan_ke }}">
        <input type="hidden" name="nominal" value="{{ $item->nominal_pembayaran }}">
        <div class="d-flex align-items-center justify-content-between">
            <p class="">
                <strong class="st-title">{{ $item->cicilan_ke == 1 ? $item->cicilan_ke.'st' : ($item->cicilan_ke == 2 ? $item->cicilan_ke.'nd' : $item->cicilan_ke.'rd') }} {{__('tagihan.term')}}</strong> <br>
                <b>Rp. {{ number_format($item->nominal_pembayaran, 2, ',', '.') }}</b>
                <br>
                @if ($item->status == 'Belum')
                <small class="text-danger"> {{__('tagihan.pay-before')}} {{ $item->jatuh_tempo_cicilan }}</small>
                @else
                <small class="text-info"> {{__('tagihan.paid-on')}} {{ $item->tanggal_pembayaran }}</small>
                @endif
            </p>
            <p class="">
            </p>
            <p class="">
                @if ($item->status == 'Lunas')
                <button type="button" class="btn btn-secondary disabled" disabled>
                    {{__('tagihan.paid-off')}}
                </button>    
                @else
                @if ($key > 0)
                @if ($cicilan[$key-1]->status == 'Lunas')
                <button class="btn btn-primary" id="pay-button">
                    {{__('tagihan.pay')}}
                </button>
                @endif
                @else
                <button class="btn btn-primary" id="pay-button">
                    {{__('tagihan.pay')}}
                </button>                    
                @endif
                @endif
            </p>
        </div>
    </div>
</div>
{{-- </form> --}}