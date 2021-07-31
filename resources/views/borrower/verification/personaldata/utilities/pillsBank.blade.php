<div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
    <div class="form-group ">
        <label for="" class="">Nama Akun Bank </label>
        <input type="text" value="{{old('nama_rekening')}}" name="nama_rekening" class="form-control " required>
    </div>
    <div class="form-group ">
        <label for="" class="">Bank</label>
        <select name="id_bank" id="id_bank" class="form-control select2 " required>
            <option value="" selected readonly disabled>Pilih Bank</option>
            @foreach ($bank as $item)
                <option value="{{ $item->id }}" {{old('id_bank') == $item->id ? 'selected' : ''}}>{{ $item->nama_bank . '  - ' . $item->kode_bank }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <label for="" class="">No.Rekening </label>
        <input type="text" name="no_rekening" value="{{old('no_rekening')}}" class="form-control " required>
    </div>
</div>