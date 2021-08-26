<div class="form-group ">
    <label for="" class=""> {{__('data-diri.photo-id')}} </label>
    <input type="file" id="scan_ktp" name="scan_ktp" class="form-control @error('scan_ktp') is-invalid @enderror" accept=".png, .jpeg" onchange="validateKtp()" required>
    <div class="ktp-error invisible"></div>
    @error('scan_ktp')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.photo-holding-id-card')}} </label>
    <input type="file" id="selfie_ktp" name="selfie_ktp" class="form-control @error('selfie_ktp') is-invalid @enderror" accept=".png, .jpeg" onchange="validateSelfie()" required>
    <div class="selfie-error invisible"></div>
    @error('selfie_ktp')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.full-name')}} </label>
    <input type="text" id="nama" name="nama" value="{{old('name', \Session::get('nama'))}}" class="form-control @error('nama') is-invalid @enderror" readonly required>
    <div class="nik-error invisible"></div>
    @error('nama')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.NIK')}} </label>
    <input type="text" id="nik" name="nik" value="{{old('nik')}}" class="form-control @error('nik') is-invalid @enderror" maxlength="16" onkeypress="return onlyNumberKey(event)" required>
    <div class="nik-error invisible"></div>
    @error('nik')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.NIP')}} (Optional) </label>
    <input type="text" id="nip" name="nip" maxlength="18" value="{{old('nip')}}" class="form-control @error('nip') is-invalid @enderror" maxlength="16" onkeypress="return onlyNumberKey(event)">
    <span id="errorMsg" style="display:none;">you can give score -10 to +10 only</span>
    <div class="nip-error invisible"></div>
    @error('nip')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.province')}} </label>
    <select name="id_provinsi" id="id_provinsi" class="form-control select2 @error('id_provinsi') is-invalid @enderror"
        data-url="{{ url('get-kabupaten') }}" required>
        <option value="" selected readonly disabled>Pilih Provinsi</option>
        @foreach ($provinsi as $item)
            <option value="{{ $item->id }}" {{old('id_provinsi') == $item->id ? 'selected' : ''}} >{{ $item->nama }}</option>    
        @endforeach
    </select>
    <div class="provinsi-error invisible"></div>
    @error('id_provinsi')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.district')}} </label>
    <select name="id_kabupaten" id="id_kabupaten" class="form-control select2 @error('id_kabupaten') is-invalid @enderror" data-url="{{ url('get-kecamatan') }}" required>
        <option value="" selected readonly disabled>Pilih Kabupaten</option>
    </select>
    <div class="kabupaten-error invisible"></div>
    @error('id_kabupaten')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.subdistrict')}} </label>
    <select name="kecamatan_id" id="id_kecamatan" class="form-control select2 @error('id_kecamatan') is-invalid @enderror" required>
        <option value="" selected readonly disabled>Pilih Kecamatan</option>
    </select>
    <div class="kecamatan-error invisible"></div>
    @error('id_kecamatan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.branch-office')}} </label>
    <select name="id_kantor_cabang" id="id_kantor_cabang" class="form-control select2 @error('id_kantor_cabang') is-invalid @enderror" required>
        <option value="" selected readonly disabled>Pilih Kantor Cabang</option>
        @foreach ($kantorCabang as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
    <div class="cabang-error invisible"></div>
    @error('id_kantor_cabang')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.place-of-birth')}} </label>
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror" required>
    <div class="tempat-lahir-error invisible"></div>
    @error('tempat_lahir')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.date-of-birth')}} </label>
    <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" required>
    <div class="tanggal-lahir-error invisible"></div>
    @error('tanggal_lahir')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group ">
    <label for="" class=""> {{__('data-diri.address')}} </label>
    <textarea name="alamat" id="alamat" cols="30" s="10" class="form-control @error('alamat') is-invalid @enderror" required>{{old('alamat')}}</textarea>
    <div class="alamat-error invisible"></div>
    @error('alamat')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@push('script')
    <script>

        $(document).ready(function() {
            // get kabupaten
            $('#id_provinsi').change(function(e) {
                $('#id_kabupaten')
                    .empty()
                    .append($("<option></option>")
                        .attr("value", '')
                        .text('Pilih Kabupaten'));
                let url = $(this).data('url') + '?id_provinsi=' + $(this).val();
                $.ajax({
                    type: "get",
                    url: url,
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(key, value) {
                            // console.log(value.value);
                            $('#id_kabupaten')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.nama));
                        });
                    }
                });
            });

            // get kecamatan
            $('#id_kabupaten').change(function(e) {
                $('#id_kecamatan')
                    .empty()
                    .append($("<option></option>")
                        .attr("value", '')
                        .text('Pilih Kecamatan'));
                let url = $(this).data('url') + '?id_kabupaten=' + $(this).val();
                $.ajax({
                    type: "get",
                    url: url,
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(key, value) {
                            // console.log(value.value);
                            $('#id_kecamatan')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.nama));
                        });
                    }
                });
            });
        });
    </script>
@endpush
