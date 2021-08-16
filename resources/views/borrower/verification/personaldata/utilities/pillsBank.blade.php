<div class="form-group ">
    <label for="" class="">  {{__('data-diri.bank-account-name')}} </label>
    <input type="text" id="nama_rekening" value="{{old('nama_rekening')}}" name="nama_rekening" class="form-control @error('nama_rekening') is-invalid @enderror" required>
    <div class="nama-rekening-error invisible"></div>
    @error('nama_rekening')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.bank')}} </label>
    <select name="id_bank" id="id_bank" class="form-control select2 @error('id_bank') is-invalid @enderror" required>
        <option value="" selected readonly disabled>Pilih Bank</option>
        @foreach ($bank as $item)
            <option value="{{ $item->id }}" {{old('id_bank') == $item->id ? 'selected' : ''}}>{{ $item->nama_bank . '  - ' . $item->kode_bank }}</option>
        @endforeach
    </select>
    <div class="bank-error invisible"></div>
    @error('id_bank')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.bank-account-number')}} </label>
    <input type="text" id="no_rekening" name="no_rekening" value="{{old('no_rekening')}}" class="form-control @error('no_rekening') is-invalid @enderror" onkeypress="return onlyNumberKeyRek(event)" required>
    <div class="norek-error invisible"></div>
    @error('no_rekening')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>