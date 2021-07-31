{{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> --}}
<div id="step-4" class="tab-pane" role="tabpanel">
    <div class="form-group row">
        <label for="" class="col-md-2">Hubungan ke satu </label>
        <select name="hubungan" id="" class="form-control col-md-4" required>
            <option value="">Pilih Hubungan</option>
            <option value="Keluarga" {{old('hubungan') == 'Keluarga' ? 'selected' : ''}}>Keluarga</option>
            <option value="Saudara" {{old('hubungan') == 'Saudara' ? 'selected' : ''}}>Saudara</option>
            <option value="Teman" {{old('hubungan') == 'Teman' ? 'selected' : ''}}>Teman</option>
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nama Penjamin </label>
        <input name="nama_penjamin" value="{{old('nama_peminjam')}}" type="text" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nik Penjamin </label>
        <input name="nik_penjamin" value="{{old('nik_peminjam')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">No.Handphone Penjamin </label>
        <input name="no_hp_penjamin" value="{{old('no_hp_penjamin')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Alamat </label>
        <textarea name="alamat_penjamin" id="" cols="30" rows="10" class="form-control col-md-4" required>{{old('alamat_penjamin')}}</textarea>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Hubungan ke dua </label>
        <select name="hubungan2" id="" class="form-control col-md-4" required>
            <option value="">Pilih Hubungan</option>
            <option value="Keluarga" {{old('hubungan2') == 'Keluarga' ? 'selected' : ''}}>Keluarga</option>
            <option value="Saudara" {{old('hubungan2') == 'Saudara' ? 'selected' : ''}}>Saudara</option>
            <option value="Teman" {{old('hubungan2') == 'Teman' ? 'selected' : ''}}>Teman</option>
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nama Penjamin </label>
        <input name="nama_penjamin2" value="{{old('nama_penjamin2')}}" type="text" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nik Penjamin </label>
        <input name="nik_penjamin2" value="{{old('nik_penjamin2')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">No.Handphone Penjamin </label>
        <input name="no_hp_penjamin2" value="{{old('no_hp_penjamin2')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Alamat </label>
        <textarea name="alamat_penjamin2" id="" cols="30" rows="10" class="form-control col-md-4" required>{{old('alamat_penjamin2')}}</textarea>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Hubungan ke tiga </label>
        <select name="hubungan3" id="" class="form-control col-md-4" required>
            <option value="">Pilih Hubungan</option>
            <option value="Keluarga" {{old('hubungan3') == 'Keluarga' ? 'selected' : ''}}>Keluarga</option>
            <option value="Saudara" {{old('hubungan3') == 'Saudara' ? 'selected' : ''}}>Saudara</option>
            <option value="Teman" {{old('hubungan3') == 'Teman' ? 'selected' : ''}}>Teman</option>
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nama Penjamin </label>
        <input name="nama_penjamin3" value="{{old('nama_penjamin3')}}" type="text" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nik Penjamin </label>
        <input name="nik_penjamin3" value="{{old('nik_penjamin3')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">No.Handphone Penjamin </label>
        <input name="no_hp_penjamin3" value="{{old('no_hp_penjamin3')}}" type="number" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Alamat </label>
        <textarea name="alamat_penjamin3" id="" cols="30" rows="10" class="form-control col-md-4" required>{{old('alamat_penjamin3')}}</textarea>
    </div>

{{-- button --}}
<div class="form-group row">
    <div class="col-md-2">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{-- <button type="submit" class="btn btn-primary">
            Simpan
        </button> --}}
    </div>
</div>


</div>
