<div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
    <div class="form-group row">
        <label for="" class="col-md-2">Nama Akun Bank </label>
        <input type="text" value="{{old('nama_rekening')}}" name="nama_rekening" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Bank</label>
        <select name="id_bank" id="id_bank" class="form-control select2 col-md-4" required>
            <option value="" selected readonly disabled>Pilih Bank</option>
            @foreach ($bank as $item)
                <option value="{{ $item->id }}" {{old('id_bank') == $item->id ? 'selected' : ''}}>{{ $item->nama_bank . '  - ' . $item->kode_bank }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">No.Rekening </label>
        <input type="text" name="no_rekening" value="{{old('no_rekening')}}" class="form-control col-md-4" required>
    </div>
</div>