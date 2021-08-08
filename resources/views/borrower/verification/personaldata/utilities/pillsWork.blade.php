<div class="tab-pane fade" id="pills-work" role="tabpanel" aria-labelledby="pills-work-tab">
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.profession')}}  </label>
        <input type="text" value="{{old('pekerjaan')}}" name="pekerjaan" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.position')}} </label>
        <input type="text" value="{{old('jabatan')}}" name="jabatan" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.company-address')}}  </label>
        <input type="text" value="{{old('alamat_perusahaan')}}" name="alamat_perusahaan" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.company-contact')}} </label>
        <input type="text" value="{{old('kontak_perusahaan')}}" name="kontak_perusahaan" class="form-control " required>
    </div>
</div>