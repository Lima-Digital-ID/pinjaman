{{-- <div class="tab-pane fade" id="pills-work" role="tabpanel" aria-labelledby="pills-work-tab"> --}}
<div id="step-3" class="tab-pane" role="tabpanel">
    <div class="form-group row">
        <label for="" class="col-md-2">Pekerjaan </label>
        <input type="text" value="{{old('pekerjaan')}}" name="pekerjaan" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Jabatan </label>
        <input type="text" value="{{old('jabatan')}}" name="jabatan" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Alamat Perusahaan </label>
        <input type="text" value="{{old('alamat_perusahaan')}}" name="alamat_perusahaan" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Kontak Perusahaan </label>
        <input type="text" value="{{old('kontak_perusahaan')}}" name="kontak_perusahaan" class="form-control col-md-4" required>
    </div>
</div>