<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingBankUmkm" data-toggle="collapse" data-target="#collapseBankUmkm" aria-expanded="true" aria-controls="collapseBankUmkm">
        <h6 class="mb-0 text-primary">
            Bank UMKM
        </h6>
        <span>0947 0001</span>
      </div>
      
      <div id="collapseBankUmkm" class="collapse show" aria-labelledby="headingBankUmkm" data-parent="#accordion">
        <div class="card-body">
          <p class="text-dark">@lang('metode-tagihan.steps').</p>
            <p class="text-muted">1. @lang('metode-tagihan.1').</p>
            <p class="text-muted">2. @lang('metode-tagihan.2').</p>
            <p class="text-muted">3. @lang('metode-tagihan.3').</p>
            <p class="text-muted">4. @lang('metode-tagihan.4').</p>
            <p class="text-muted">5. @lang('metode-tagihan.5').</p>
            <p class="text-muted">6. @lang('metode-tagihan.6').</p>
            <p class="text-muted">7. @lang('metode-tagihan.7').</p>
          <form action="{{ route('pembayaran') }}" method="post">
            @csrf
            <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
            <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
            <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
            <input type="hidden" name="nominal" value="{{ $nominal }}">
            <input type="hidden" name="metode_pembayaran" value="Bank UMKM">
            <button type="submit" class="btn btn-primary">
                @lang('metode-tagihan.btn')
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingAlfamart" data-toggle="collapse" data-target="#collapseAlfamart" aria-expanded="false" aria-controls="collapseAlfamart">
        <h6 class="mb-0 text-primary">
            Alfamart
        </h6>
        <span>0947 0002</span>
      </div>
      <div id="collapseAlfamart" class="collapse" aria-labelledby="headingAlfamart" data-parent="#accordion">
        <div class="card-body">
            <p class="text-dark">@lang('metode-tagihan.steps').</p>
            <p class="text-muted">1. @lang('metode-tagihan.1').</p>
            <p class="text-muted">2. @lang('metode-tagihan.2').</p>
            <p class="text-muted">3. @lang('metode-tagihan.3').</p>
            <p class="text-muted">4. @lang('metode-tagihan.4').</p>
            <p class="text-muted">5. @lang('metode-tagihan.5').</p>
            <p class="text-muted">6. @lang('metode-tagihan.6').</p>
            <p class="text-muted">7. @lang('metode-tagihan.7').</p>
            <form action="{{ route('pembayaran') }}" method="post">
                @csrf
                <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
                <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
                <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
                <input type="hidden" name="nominal" value="{{ $nominal }}">
                <input type="hidden" name="metode_pembayaran" value="Alfamart">
                <button type="submit" class="btn btn-primary">
                    @lang('metode-tagihan.btn')
                </button>
            </form>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingIndomaret" data-toggle="collapse" data-target="#collapseIndomaret" aria-expanded="false" aria-controls="collapseIndomaret">
        <h6 class="mb-0 text-primary">
            Indomaret
        </h6>
        <span>0947 0002</span>
      </div>
      <div id="collapseIndomaret" class="collapse" aria-labelledby="headingIndomaret" data-parent="#accordion">
        <div class="card-body">
            <p class="text-dark">@lang('metode-tagihan.steps').</p>
            <p class="text-muted">1. @lang('metode-tagihan.1').</p>
            <p class="text-muted">2. @lang('metode-tagihan.2').</p>
            <p class="text-muted">3. @lang('metode-tagihan.3').</p>
            <p class="text-muted">4. @lang('metode-tagihan.4').</p>
            <p class="text-muted">5. @lang('metode-tagihan.5').</p>
            <p class="text-muted">6. @lang('metode-tagihan.6').</p>
            <p class="text-muted">7. @lang('metode-tagihan.7').</p>
            <form action="{{ route('pembayaran') }}" method="post">
                @csrf
                <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
                <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
                <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
                <input type="hidden" name="nominal" value="{{ $nominal }}">
                <input type="hidden" name="metode_pembayaran" value="Indomaret">
                <button type="submit" class="btn btn-primary">
                    @lang('metode-tagihan.btn')
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>