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
          <p class="text-dark">Langkah-langkah pembayaran Bank UMKM.</p>
          <p class="text-muted">1. Masuk ke aplikasi Bank UMKM.</p>
          <p class="text-muted">2. Pilih menu pembayaran.</p>
          <p class="text-muted">3. Pilih tagihan yang akan dibayar.</p>
          <p class="text-muted">4. Konfirmasi nominal pembayaran.</p>
          <p class="text-muted">5. Tekan tombol 'Biaya'.</p>
          <p class="text-muted">6. Masukkan password.</p>
          <p class="text-muted">7. Pembayaran berhasil.</p>
          <form action="{{ route('pembayaran') }}" method="post">
            @csrf
            <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
            <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
            <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
            <input type="hidden" name="nominal" value="{{ $nominal }}">
            <input type="hidden" name="metode_pembayaran" value="Bank UMKM">
            <button type="submit" class="btn btn-primary">
                Bayar
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
            <p class="text-dark">Langkah-langkah pembayaran Bank UMKM.</p>
            <p class="text-muted">1. Masuk ke aplikasi Bank UMKM.</p>
            <p class="text-muted">2. Pilih menu pembayaran.</p>
            <p class="text-muted">3. Pilih tagihan yang akan dibayar.</p>
            <p class="text-muted">4. Konfirmasi nominal pembayaran.</p>
            <p class="text-muted">5. Tekan tombol 'Biaya'.</p>
            <p class="text-muted">6. Masukkan password.</p>
            <p class="text-muted">7. Pembayaran berhasil.</p>
            <form action="{{ route('pembayaran') }}" method="post">
                @csrf
                <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
                <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
                <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
                <input type="hidden" name="nominal" value="{{ $nominal }}">
                <input type="hidden" name="metode_pembayaran" value="Alfamart">
                <button type="submit" class="btn btn-primary">
                    Bayar
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
            <p class="text-dark">Langkah-langkah pembayaran Bank UMKM.</p>
            <p class="text-muted">1. Masuk ke aplikasi Bank UMKM.</p>
            <p class="text-muted">2. Pilih menu pembayaran.</p>
            <p class="text-muted">3. Pilih tagihan yang akan dibayar.</p>
            <p class="text-muted">4. Konfirmasi nominal pembayaran.</p>
            <p class="text-muted">5. Tekan tombol 'Biaya'.</p>
            <p class="text-muted">6. Masukkan password.</p>
            <p class="text-muted">7. Pembayaran berhasil.</p>
            <form action="{{ route('pembayaran') }}" method="post">
                @csrf
                <input type="hidden" name="id_pelunasan" value="{{ $id_pelunasan }}">
                <input type="hidden" name="id_pinjaman" value="{{ $id_pinjaman }}">
                <input type="hidden" name="cicilan_ke" value="{{ $cicilan_ke }}">
                <input type="hidden" name="nominal" value="{{ $nominal }}">
                <input type="hidden" name="metode_pembayaran" value="Indomaret">
                <button type="submit" class="btn btn-primary">
                    Bayar
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>