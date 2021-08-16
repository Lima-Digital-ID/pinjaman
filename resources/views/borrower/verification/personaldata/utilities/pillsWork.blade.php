<div class="form-group ">
    <label for="" class=""> {{__('data-diri.profession')}}  </label>
    <input type="text" value="{{old('pekerjaan')}}" name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required>
    <div class="pekerjaan-error invisible"></div>
    @error('pekerjaan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.position')}} </label>
    <input type="text" value="{{old('jabatan')}}" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
    <div class="jabatan-error invisible"></div>
    @error('jabatan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.company-address')}}  </label>
    <input type="text" value="{{old('alamat_perusahaan')}}" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror" required>
    <div class="alamat-perusahaan-error invisible"></div>
    @error('alamat_perusahaan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.company-contact')}} </label>
    <input type="text" value="{{old('kontak_perusahaan')}}" name="kontak_perusahaan" id="kontak_perusahaan" onkeypress="return onlyNumberKeyRek(event)" class="form-control @error('kontak_perusahaan') is-invalid @enderror" required>
    <div class="kontak-perusahaan-error invisible"></div>
    @error('kontak_perusahaan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>