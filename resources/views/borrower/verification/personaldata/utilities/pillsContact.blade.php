<div class="form-group ">
    <label for="" class=""> {{__('data-diri.ibu-kandung')}} </label>
    <input name="ibu_kandung" id="ibu-kandung" value="{{old('ibu_kandung')}}" type="text" class="form-control @error('ibu_kandung') is-invalid @enderror" required>
    <div class="nama-penjamin-error invisible"></div>
    @error('ibu_kandung')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.relationship-to-one')}} </label>
    <select name="hubungan" id="hubungan" class="form-control @error('hubungan') is-invalid @enderror" required>
        <option value="">Pilih Hubungan</option>
        <option value="Keluarga" {{old('hubungan') == 'Keluarga' ? 'selected' : ''}}>Keluarga</option>
        <option value="Saudara" {{old('hubungan') == 'Saudara' ? 'selected' : ''}}>Saudara</option>
        {{-- <option value="Teman" {{old('hubungan') == 'Teman' ? 'selected' : ''}}>Teman</option> --}}
    </select>
    <div class="hubungan-error invisible"></div>
    @error('hubungan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.guarantor-name')}} </label>
    <input name="nama_penjamin" id="nama_penjamin" value="{{old('nama_penjamin')}}" type="text" class="form-control @error('nama_penjamin') is-invalid @enderror" required>
    <div class="nama-penjamin-error invisible"></div>
    @error('nama_penjamin')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.guarantor-nik')}} </label>
    <input name="nik_penjamin" id="nik_penjamin" value="{{old('nik_penjamin')}}" onkeypress="return onlyNumberNikPenjamin(event)" maxlength="16" type="text" class="form-control @error('nik_penjamin') is-invalid @enderror" required>
    <div class="nik-penjamin-error invisible"></div>
    @error('nik_penjamin')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.guarantor-handphone')}} </label>
    <input name="no_hp_penjamin" id="no_hp_penjamin" value="{{old('no_hp_penjamin')}}" onkeypress="return onlyNumberKeyRek(event)" type="text" class="form-control @error('no_hp_penjamin') is-invalid @enderror" required>
    <div class="no-hp-penjamin-error invisible"></div>
    @error('no_hp_penjamin')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">{{__('data-diri.address')}} </label>
    <textarea name="alamat_penjamin" id="alamat_penjamin" cols="30" rows="10" class="form-control @error('alamat_penjamin') is-invalid @enderror" required>{{old('alamat_penjamin')}}</textarea>
    <div class="alamat-penjamin-error invisible"></div>
    @error('alamat_penjamin')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">Hubungan ke dua </label>
    <select name="hubungan2" id="hubungan2" class="form-control @error('hubungan2') is-invalid @enderror" required>
        <option value="">Pilih Hubungan</option>
        <option value="Keluarga" {{old('hubungan2') == 'Keluarga' ? 'selected' : ''}}>Keluarga</option>
        <option value="Saudara" {{old('hubungan2') == 'Saudara' ? 'selected' : ''}}>Saudara</option>
        {{-- <option value="Teman" {{old('hubungan2') == 'Teman' ? 'selected' : ''}}>Teman</option> --}}
    </select>
    <div class="hubungan2-error invisible"></div>
    @error('hubungan2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">{{__('data-diri.guarantor-name')}} </label>
    <input name="nama_penjamin2" id="nama_penjamin2" value="{{old('nama_penjamin2')}}" type="text" class="form-control @error('nama_penjamin2') is-invalid @enderror" required>
    <div class="nama-penjamin2-error invisible"></div>
    @error('nama_penjamin2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">{{__('data-diri.guarantor-nik')}} </label>
    <input name="nik_penjamin2" id="nik_penjamin2" value="{{old('nik_penjamin2')}}" onkeypress="return onlyNumberKey(event)" maxlength="16" type="text" class="form-control @error('nik_penjamin2') is-invalid @enderror" required>
    <div class="nik-penjamin2-error invisible"></div>
    @error('nik_penjamin2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">{{__('data-diri.guarantor-handphone')}} </label>
    <input name="no_hp_penjamin2" id="no_hp_penjamin2" value="{{old('no_hp_penjamin2')}}" onkeypress="return onlyNumberNikPenjamin2(event)" type="text" class="form-control @error('no_hp_penjamin2') is-invalid @enderror" required>
    <div class="no-hp-penjamin2-error invisible"></div>
    @error('no_hp_penjamin2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class="">{{__('data-diri.address')}} </label>
    <textarea name="alamat_penjamin2" id="alamat_penjamin2" cols="30" rows="10" class="form-control @error('alamat_penjamin2') is-invalid @enderror" required>{{old('alamat_penjamin2')}}</textarea>
    <div class="alamat-penjamin2-error invisible"></div>
    @error('alamat_penjamin2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group row">
    <div class="col-md-2">
        {{-- <div class="form-check"> --}}
            <input class="" type="checkbox" value="" id="defaultCheck1" required>
            
          {{-- </div> --}}
    </div>
    <div class="col-md-10">
        <label class="" for="defaultCheck1">
            Saya telah membaca dan menyetujui <a href="javascript:void(0)"> <strong>Syarat & Ketentuan</strong></a> serta <a href="{{route('kebijakan.privasi')}}" target="_blank"><strong>Kebijakan Privasi</strong></a>
        </label>
    </div>
</div>

{{-- button --}}
{{-- <div class="form-group ">
    <div class="">
        <button type="submit" class="btn btn-primary">
            {{__('data-diri.btn')}}
        </button>
    </div>
</div> --}}