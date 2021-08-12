<!-- Modal -->
<div class="modal fade" id="message<?php echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">History Pinjaman {{$loop->iteration}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <div class="row"> --}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Riwayat</h6>
                </div>
                <div class="card-body text-left">
                    <div class="form-group">
                        <label for=""> {{__('detail-riwayat.loan-amount')}} </label>    
                        <p> <strong>
                            Rp.{{ number_format($nominal, 2, ',', '.') }}
                        </strong>
                        </p>
                    </div>
    
                    <div class="form-group">
                        <label for=""> {{__('detail-riwayat.insurance-fee')}} </label>
                        <p>
                            <strong>
                                Rp.{{ number_format($asuransi, 2, ',', '.') }}
                            </strong>
                        </p>
                    </div>
    
                    <div class="form-group">
                        <label for=""> {{__('detail-riwayat.payment-plan')}} </label>
                        <p> 
                            <strong>
                                Rp.{{ number_format(($operational), 2, ',', '.').' x '.$jangka_waktu }}
                            </strong>
                        </p>
                    </div>
              
                    <hr>
                    <div class="form-group d-flex justify-content-between">
                        <div class="label"> {{__('detail-riwayat.loan-kode')}} </div>
                        <p>
                            
                            {{$kode_pinjaman}}
                        </p>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="label"> {{__('detail-riwayat.submission-time')}} </div>
                        <p>
                            
                            {{$tanggal_pengajuan}}
                        </p>
                    </div>
                </div> 
            </div> 
          {{-- </div> --}}
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>