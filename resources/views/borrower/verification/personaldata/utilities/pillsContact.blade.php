<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.relationship-to-one')}} </label>
        <select name="hubungan" id="" class="form-control " required>
            <option value="">Pilih Hubungan</option>
            <option value="Keluarga" {{old('hubungan') == 'Kerabat' ? 'selected' : ''}}>Hubungan kerabat</option>
            <option value="Saudara" {{old('hubungan') == 'Keluarga' ? 'selected' : ''}}>Keluarga terdekat</option>
        </select>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.guarantor-name')}} </label>
        <input name="nama_penjamin" value="{{old('nama_peminjam')}}" type="text" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.guarantor-nik')}} </label>
        <input name="nik_penjamin" value="{{old('nik_peminjam')}}" type="number" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class=""> {{__('data-diri.guarantor-handphone')}} </label>
        <input name="no_hp_penjamin" value="{{old('no_hp_penjamin')}}" type="number" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class="">{{__('data-diri.address')}} </label>
        <textarea name="alamat_penjamin" id="" cols="30" rows="10" class="form-control " required>{{old('alamat_penjamin')}}</textarea>
    </div>
    <div class="form-group ">
        <label for="" class="">Hubungan ke dua </label>
        <select name="hubungan2" id="" class="form-control " required>
            <option value="">Pilih Hubungan</option>
            <option value="Keluarga" {{old('hubungan') == 'Kerabat' ? 'selected' : ''}}>Hubungan kerabat</option>
            <option value="Saudara" {{old('hubungan') == 'Keluarga' ? 'selected' : ''}}>Keluarga terdekat</option>
        </select>
    </div>
    <div class="form-group ">
        <label for="" class="">{{__('data-diri.guarantor-name')}} </label>
        <input name="nama_penjamin2" value="{{old('nama_penjamin2')}}" type="text" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class="">{{__('data-diri.guarantor-nik')}} </label>
        <input name="nik_penjamin2" value="{{old('nik_penjamin2')}}" type="number" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class="">{{__('data-diri.guarantor-handphone')}} </label>
        <input name="no_hp_penjamin2" value="{{old('no_hp_penjamin2')}}" type="number" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class="">{{__('data-diri.address')}} </label>
        <textarea name="alamat_penjamin2" id="" cols="30" rows="10" class="form-control " required>{{old('alamat_penjamin2')}}</textarea>
    </div>

{{-- button --}}
<div class="form-group ">
    <div class="">
        {{-- <input type="submit" value="Simpan" class="btn btn-primary"> --}}
        <button type="submit" class="btn btn-primary">
            {{__('data-diri.btn')}}
        </button>
    </div>
</div>


</div>
