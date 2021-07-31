<div class="tab-pane fade show active" id="pills-ktp" role="tabpanel" aria-labelledby="pills-ktp-tab">
    <div class="form-group row">
        <label for="" class="col-md-2">Foto KTP</label>
        <input type="file" name="scan_ktp" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Foto Memegang KTP</label>
        <input type="file" name="selfie_ktp" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Nama Lengkap</label>
        <input type="text" name="nama" value="{{old('name')}}" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">NIK</label>
        <input type="number" name="nik" value="{{old('nik')}}" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Provinsi</label>
        <select name="id_provinsi" id="id_provinsi" class="form-control select2 col-md-4"
            data-url="{{ url('get-kabupaten') }}" required>
            <option value="" selected readonly disabled>Pilih Provinsi</option>
            @foreach ($provinsi as $item)
                <option value="{{ $item->id }}" {{old('id_provinsi') == $item->id ? 'selected' : ''}} >{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Kabupaten</label>
        <select name="id_kabupaten" id="id_kabupaten" class="form-control select2 col-md-4" data-url="{{ url('get-kecamatan') }}" required>
            <option value="" selected readonly disabled>Pilih Kabupaten</option>
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Kecamatan</label>
        <select name="kecamatan_id" id="id_kecamatan" class="form-control select2 col-md-4" required>
            <option value="" selected readonly disabled>Pilih Kecamatan</option>
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Kantor Cabang</label>
        <select name="id_kantor_cabang" id="id_kantor_cabang" class="form-control select2 col-md-4" required>
            <option value="" selected readonly disabled>Pilih Kantor Cabang</option>
            @foreach ($kantorCabang as $item)
                <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Tempat lahir</label>
        <input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Tanggal Lahir</label>
        <input type="text" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" class="form-control datepicker col-md-4" required>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="10" class="form-control col-md-4" required>{{old('alamat')}}</textarea>
    </div>
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
