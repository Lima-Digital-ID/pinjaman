@extends('borrower.app', ['jumbotron' => ''])

@push('stylesheet')
    <link href="{{ asset('borrower/vendor/form-wizard/style.css') }}" rel="stylesheet">
@endpush

@section('body')

    @if (\Session::get('is_verified') == 1)
        <div class="alert alert-success" role="alert">
            <strong> @lang('alert.information') </strong> @lang('alert.info-acc')
        </div>
    @endif

    @if (\Session::get('is_verified') == 2)
        <div class="alert alert-info" role="alert">
            <strong>@lang('alert.information')</strong> @lang('alert.info-pending')
        </div>
    @endif

    @if (\Session::get('is_verified') == 0 || \Session::get('is_verified') == 3)

        @if (\Session::get('is_verified') == 3)
            <div class="alert alert-danger" role="alert">
                <strong>@lang('alert.warning')</strong> @lang('alert.info-reject')
            </div>
        @endif
        <!-- MultiStep Form -->
        <div class="container-fluid">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Lengkapi Data Diri Anda</strong></h2>
                        <p>Isi semua form untuk melanjutkan ke tahap selanjutnya</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="{{ route('personal.store-data') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>KTP</strong></li>
                                        <li id="personal"><strong>Bank</strong></li>
                                        <li id="payment"><strong>Pekerjaan</strong></li>
                                        <li id="confirm"><strong>Kontak</strong></li>
                                    </ul> 
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Data KTP</h2>
                                            <!-- pills ktp -->

                                            @include('borrower.verification.personaldata.utilities.pillsKTP')
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Selanjutnya" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Data Akun Bank</h2>
                                            <!-- pills bank -->
                                            @include('borrower.verification.personaldata.utilities.pillsBank')
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Kembali" />
                                        <input type="button" name="next" class="next action-button" value="Selanjutnya" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Data Pekerjaan</h2>
                                            <!-- pills work -->
                                            @include('borrower.verification.personaldata.utilities.pillsWork')
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Kembali" />
                                        <input type="button" name="next" class="next action-button" value="Selanjutnya" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Data Kontak</h2>

                                            <!-- pills contact -->
                                            @include('borrower.verification.personaldata.utilities.pillsContact')
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Kembali" />
                                        <input type="submit" name="make_payment" class="next action-button" value="Kirim" />
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End MultiStep Form -->

    @endif
@endsection

@push('script')
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                alert('Hanya boleh memasukkan angka.');
                return false;
            }
            if ($("#nik").val().length > 16) {
                alert('Maksimal 16 digit.');
                return false;
            }
            return true;
        }

        function onlyNumberKeyRek(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                alert('Hanya boleh memasukkan angka.');
                return false;
            }
            return true;
        }

        function onlyNumberNikPenjamin(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                alert('Hanya boleh memasukkan angka.');
                return false;
            }
            if ($("#nik_penjamin").val().length > 16) {
                alert('Maksimal 16 digit.');
                return false;
            }
            return true;
        }

        function onlyNumberNikPenjamin2(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                alert('Hanya boleh memasukkan angka.');
                return false;
            }
            if ($("#nik_penjamin2").val().length > 16) {
                alert('Maksimal 16 digit.');
                return false;
            }
            return true;
        }

        function validateFormKtp() {
            var scan_ktp = $('#scan_ktp').val();
            var selfie_ktp = $('#selfie_ktp').val();
            var nik = $("#nik").val();
            var provinsi = $('#id_provinsi').val();
            var kabupaten = $('#id_kabupaten').val();
            var kecamatan = $('#id_kecamatan').val();
            var cabang = $('#id_kantor_cabang').val();
            var tempat_lahir = $('#tempat_lahir').val();
            var tanggal_lahir = $('#tanggal_lahir').val();
            var alamat = $('#alamat').val();

            if (scan_ktp == "" || scan_ktp == null) {
                $("#scan_ktp").addClass('is-invalid');
                $("#scan_ktp").focus();
                $(".ktp-error").removeClass('invisible');
                $(".ktp-error").addClass('invalid-feedback');
                $(".ktp-error").html("Foto KTP harus dipilih.");
                console.log('scan kosong');
                return false;
            } else {
                $("#scan_ktp").removeClass('is-invalid');
                $(".ktp-error").addClass('invisible');
            }
            if (selfie_ktp == "" || selfie_ktp == null) {
                $("#selfie_ktp").addClass('is-invalid');
                $("#selfie_ktp").focus();
                $(".selfie-error").removeClass('invisible');
                $(".selfie-error").addClass('invalid-feedback');
                $(".selfie-error").html("Selfie KTP harus dipilih.");
                console.log('selfie kosong');
                return false;
            } else {
                $("#selfie_ktp").removeClass('is-invalid');
                $(".selfie-error").addClass('invisible');
            }
            if (nik == "" || nik == null) {
                $("#nik").addClass('is-invalid');
                $("#nik").focus();
                $(".nik-error").removeClass('invisible');
                $(".nik-error").addClass('invalid-feedback');
                $(".nik-error").html("NIK harus diisi.");
                console.log('nik kosong');
                return false;
            } else if (nik.length > 16 || nik.length < 16) {
                $("#nik").addClass('is-invalid');
                $("#nik").focus();
                $(".nik-error").removeClass('invisible');
                $(".nik-error").addClass('invalid-feedback');
                $(".nik-error").html("NIK harus berisi 16 digit.");
                console.log('nik kurang/lebih dari 16 digit');
                return false;
            } else {
                $("#nik").removeClass('is-invalid');
                $(".nik-error").addClass('invisible');
            }
            if (provinsi == "" || provinsi == null) {
                $("#id_provinsi").addClass('is-invalid');
                $("#id_provinsi").focus();
                $(".provinsi-error").removeClass('invisible');
                $(".provinsi-error").addClass('invalid-feedback');
                $(".provinsi-error").html("Provinsi harus dipilih.");
                console.log('provinsi kosong');
                return false;
            } else {
                $("#id_provinsi").removeClass('is-invalid');
                $(".provinsi-error").addClass('invisible');
            }
            if (kabupaten == "" || kabupaten == null) {
                $("#id_kabupaten").addClass('is-invalid');
                $("#id_kabupaten").focus();
                $(".kabupaten-error").removeClass('invisible');
                $(".kabupaten-error").addClass('invalid-feedback');
                $(".kabupaten-error").html("Kabupaten harus dipilih.");
                console.log('kabupaten kosong');
                return false;
            } else {
                $("#id_kabupaten").removeClass('is-invalid');
                $(".kabupaten-error").addClass('invisible');
            }
            if (kecamatan == "" || kecamatan == null) {
                $("#id_kecamatan").addClass('is-invalid');
                $("#id_kecamatan").focus();
                $(".kecamatan-error").removeClass('invisible');
                $(".kecamatan-error").addClass('invalid-feedback');
                $(".kecamatan-error").html("Kecamatan harus dipilih.");
                console.log('kecamatan kosong');
                return false;
            } else {
                $("#id_kecamatan").removeClass('is-invalid');
                $(".kecamatan-error").addClass('invisible');
            }
            if (cabang == "" || cabang == null) {
                $("#id_kantor_cabang").addClass('is-invalid');
                $("#id_kantor_cabang").focus();
                $(".cabang-error").removeClass('invisible');
                $(".cabang-error").addClass('invalid-feedback');
                $(".cabang-error").html("Cabang harus dipilih.");
                console.log('cabang kosong');
                return false;
            } else {
                $("#id_kantor_cabang").removeClass('is-invalid');
                $(".cabang-error").addClass('invisible');
            }
            if (tempat_lahir == "" || tempat_lahir == null) {
                $("#tempat_lahir").addClass('is-invalid');
                $("#tempat_lahir").focus();
                $(".tempat-lahir-error").removeClass('invisible');
                $(".tempat-lahir-error").addClass('invalid-feedback');
                $(".tempat-lahir-error").html("Tempat Lahir harus dipilih.");
                console.log('tempat lahir kosong');
                return false;
            } else {
                $("#tempat_lahir").removeClass('is-invalid');
                $(".tempat-lahir-error").addClass('invisible');
            }

            if (alamat == "" || alamat == null) {
                $("#alamat").addClass('is-invalid');
                $("#alamat").focus();
                $(".alamat-error").removeClass('invisible');
                $(".alamat-error").addClass('invalid-feedback');
                $(".alamat-error").html("Alamat harus dipilih.");
                console.log('alamat kosong');
                return false;
            } else {
                $("#alamat").removeClass('is-invalid');
                $(".alamat-error").addClass('invisible');
            }
            if (tanggal_lahir == "" || tanggal_lahir == null) {
                $("#tanggal_lahir").addClass('is-invalid');
                $("#tanggal_lahir").focus();
                $(".tanggal-lahir-error").removeClass('invisible');
                $(".tanggal-lahir-error").addClass('invalid-feedback');
                $(".tanggal-lahir-error").html("Tanggal Lahir harus dipilih.");
                console.log('tanggal lahir kosong');
                return false;
            } else {
                var birthday = tanggal_lahir.split("-");
                var dtCurrent = new Date();
                console.log('birthday date ' + birthday[0]);
                console.log('current date ' + dtCurrent.getFullYear());
                if (birthday[0] == dtCurrent.getFullYear()) {
                    $("#tanggal_lahir").addClass('is-invalid');
                    $("#tanggal_lahir").focus();
                    $(".tanggal-lahir-error").removeClass('invisible');
                    $(".tanggal-lahir-error").addClass('invalid-feedback');
                    $(".tanggal-lahir-error").html("Usia harus diatas 18 tahun.");
                    return false;
                }
                if (dtCurrent.getFullYear() - birthday[0] < 18) {
                    $("#tanggal_lahir").addClass('is-invalid');
                    $("#tanggal_lahir").focus();
                    $(".tanggal-lahir-error").removeClass('invisible');
                    $(".tanggal-lahir-error").addClass('invalid-feedback');
                    $(".tanggal-lahir-error").html("Usia harus diatas 18 tahun.");
                    return false;
                }
                $("#tanggal_lahir").removeClass('is-invalid');
                $(".tanggal-lahir-error").addClass('invisible');
                return true;
            }
            return true;
        }

        function validateFormBank() {
            var nama_rekening = $("#nama_rekening").val();
            var bank = $("#id_bank").val();
            var no_rekening = $("#no_rekening").val();

            if (nama_rekening == "" || nama_rekening == null) {
                $("#nama_rekening").addClass('is-invalid');
                $("#nama_rekening").focus();
                $(".nama-rekening-error").removeClass('invisible');
                $(".nama-rekening-error").addClass('invalid-feedback');
                $(".nama-rekening-error").html("Nama Rekening harus diisi.");
                console.log('nama rekening kosong');
                return false;
            } else {
                $("#nama_rekening").removeClass('is-invalid');
                $(".nama-rekening-error").addClass('invisible');
            }
            if (bank == "" || bank == null) {
                $("#id_bank").addClass('is-invalid');
                $("#id_bank").focus();
                $(".bank-error").removeClass('invisible');
                $(".bank-error").addClass('invalid-feedback');
                $(".bank-error").html("Bank harus dipilih.");
                console.log('bank kosong');
                return false;
            } else {
                $("#id_bank").removeClass('is-invalid');
                $(".bank-error").addClass('invisible');
            }
            if (no_rekening == "" || no_rekening == null) {
                $("#no_rekening").addClass('is-invalid');
                $("#no_rekening").focus();
                $(".norek-error").removeClass('invisible');
                $(".norek-error").addClass('invalid-feedback');
                $(".norek-error").html("Nomor Rekening harus diisi.");
                console.log('nomor rekening kosong');
                return false;
            } else {
                $("#no_rekening").removeClass('is-invalid');
                $(".norek-error").addClass('invisible');
            }
            return true;
        }

        function validateFormPekerjaan() {
            var pekerjaan = $("#pekerjaan").val();
            var jabatan = $("#jabatan").val();
            var alamat_perusahaan = $("#alamat_perusahaan").val();
            var kontak_perusahaan = $("#kontak_perusahaan").val();

            if (pekerjaan == "" || pekerjaan == null) {
                $("#pekerjaan").addClass('is-invalid');
                $("#pekerjaan").focus();
                $(".pekerjaan-error").removeClass('invisible');
                $(".pekerjaan-error").addClass('invalid-feedback');
                $(".pekerjaan-error").html("Pekerjaan harus diisi.");
                console.log('pekerjaan kosong');
                return false;
            } else {
                $("#pekerjaan").removeClass('is-invalid');
                $(".pekerjaan-error").addClass('invisible');
            }
            if (jabatan == "" || jabatan == null) {
                $("#jabatan").addClass('is-invalid');
                $("#jabatan").focus();
                $(".jabatan-error").removeClass('invisible');
                $(".jabatan-error").addClass('invalid-feedback');
                $(".jabatan-error").html("Jabatan harus diisi.");
                console.log('jabatan kosong');
                return false;
            } else {
                $("#jabatan").removeClass('is-invalid');
                $(".jabatan-error").addClass('invisible');
            }
            if (alamat_perusahaan == "" || alamat_perusahaan == null) {
                $("#alamat_perusahaan").addClass('is-invalid');
                $("#alamat_perusahaan").focus();
                $(".alamat-perusahaan-error").removeClass('invisible');
                $(".alamat-perusahaan-error").addClass('invalid-feedback');
                $(".alamat-perusahaan-error").html("Alamat Perusahaan harus diisi.");
                console.log('alamat perusahaan kosong');
                return false;
            } else {
                $("#alamat_perusahaan").removeClass('is-invalid');
                $(".alamat-perusahaan-error").addClass('invisible');
            }
            if (kontak_perusahaan == "" || kontak_perusahaan == null) {
                $("#kontak_perusahaan").addClass('is-invalid');
                $("#kontak_perusahaan").focus();
                $(".kontak-perusahaan-error").removeClass('invisible');
                $(".kontak-perusahaan-error").addClass('invalid-feedback');
                $(".kontak-perusahaan-error").html("Kontak Perusahaan harus diisi.");
                console.log('kontak perusahaan kosong');
                return false;
            } else {
                $("#kontak_perusahaan").removeClass('is-invalid');
                $(".kontak-perusahaan-error").addClass('invisible');
            }
            return true;
        }

        function validateFormKontak() {
            var hubungan = $("#hubungan").val();
            var nama_penjamin = $("#nama_penjamin").val();
            var nik_penjamin = $("#nik_penjamin").val();
            var no_hp_penjamin = $("#no_hp_penjamin").val();
            var alamat_penjamin = $("#alamat_penjamin").val();
            var hubungan2 = $("#hubungan2").val();
            var nama_penjamin2 = $("#nama_penjamin2").val();
            var nik_penjamin2 = $("#nik_penjamin2").val();
            var no_hp_penjamin2 = $("#no_hp_penjamin2").val();
            var alamat_penjamin2 = $("#alamat_penjamin2").val();

            /** Hubungan 1 */
            if (hubungan == "" || hubungan == null) {
                $("#hubungan").addClass('is-invalid');
                $("#hubungan").focus();
                $(".hubungan-error").removeClass('invisible');
                $(".hubungan-error").addClass('invalid-feedback');
                $(".hubungan-error").html("Hubungan harus diisi.");
                console.log('hubungan kosong');
                return false;
            } else {
                $("#hubungan").removeClass('is-invalid');
                $(".hubungan-error").addClass('invisible');
            }
            if (nama_penjamin == "" || nama_penjamin == null) {
                $("#nama_penjamin").addClass('is-invalid');
                $("#nama_penjamin").focus();
                $(".nama-penjamin-error").removeClass('invisible');
                $(".nama-penjamin-error").addClass('invalid-feedback');
                $(".nama-penjamin-error").html("Nama Kerabat harus diisi.");
                console.log('nama_penjamin kosong');
                return false;
            } else {
                $("#nama_penjamin").removeClass('is-invalid');
                $(".nama-penjamin-error").addClass('invisible');
            }
            if (nik_penjamin == "" || nik_penjamin == null) {
                $("#nik_penjamin").addClass('is-invalid');
                $("#nik_penjamin").focus();
                $(".nik-penjamin-error").removeClass('invisible');
                $(".nik-penjamin-error").addClass('invalid-feedback');
                $(".nik-penjamin-error").html("NIK Kerabat harus diisi.");
                console.log('nik_penjamin kosong');
                return false;
            } else if (nik_penjamin.length > 16 || nik_penjamin.length < 16) {
                $("#nik_penjamin").addClass('is-invalid');
                $("#nik_penjamin").focus();
                $(".nik-penjamin-error").removeClass('invisible');
                $(".nik-penjamin-error").addClass('invalid-feedback');
                $(".nik-penjamin-error").html("NIK harus berisi 16 digit.");
                console.log('nik kurang/lebih dari 16 digit');
                return false;
            } else {
                $("#nik_penjamin").removeClass('is-invalid');
                $(".nik-penjamin-error").addClass('invisible');
            }
            if (no_hp_penjamin == "" || no_hp_penjamin == null) {
                $("#no_hp_penjamin").addClass('is-invalid');
                $("#no_hp_penjamin").focus();
                $(".no-hp-penjamin-error").removeClass('invisible');
                $(".no-hp-penjamin-error").addClass('invalid-feedback');
                $(".no-hp-penjamin-error").html("Nomor Handphone Kerabat harus diisi.");
                console.log('hp penjamin perusahaan kosong');
                return false;
            } else {
                $("#no_hp_penjamin").removeClass('is-invalid');
                $(".no-hp-penjamin-error").addClass('invisible');
            }
            if (alamat_penjamin == "" || alamat_penjamin == null) {
                $("#alamat_penjamin").addClass('is-invalid');
                $("#alamat_penjamin").focus();
                $(".alamat-penjamin-error").removeClass('invisible');
                $(".alamat-penjamin-error").addClass('invalid-feedback');
                $(".alamat-penjamin-error").html("Alamat Kerabat harus diisi.");
                console.log('alamat_penjamin kosong');
                return false;
            } else {
                $("#alamat_penjamin").removeClass('is-invalid');
                $(".alamat-penjamin-error").addClass('invisible');
            }

            /** Hubungan 2 */
            if (hubungan2 == "" || hubungan2 == null) {
                $("#hubungan2").addClass('is-invalid');
                $("#hubungan2").focus();
                $(".hubungan2-error").removeClass('invisible');
                $(".hubungan2-error").addClass('invalid-feedback');
                $(".hubungan2-error").html("Hubungan harus diisi.");
                console.log('hubungan2 kosong');
                return false;
            } else {
                $("#hubungan2").removeClass('is-invalid');
                $(".hubungan2-error").addClass('invisible');
            }
            if (nama_penjamin2 == "" || nama_penjamin2 == null) {
                $("#nama_penjamin2").addClass('is-invalid');
                $("#nama_penjamin2").focus();
                $(".nama-penjamin2-error").removeClass('invisible');
                $(".nama-penjamin2-error").addClass('invalid-feedback');
                $(".nama-penjamin2-error").html("Nama Kerabat harus diisi.");
                console.log('nama_penjamin2 kosong');
                return false;
            } else {
                $("#nama_penjamin2").removeClass('is-invalid');
                $(".nama-penjamin2-error").addClass('invisible');
            }
            if (nik_penjamin2 == "" || nik_penjamin2 == null) {
                $("#nik_penjamin2").addClass('is-invalid');
                $("#nik_penjamin2").focus();
                $(".nik-penjamin2-error").removeClass('invisible');
                $(".nik-penjamin2-error").addClass('invalid-feedback');
                $(".nik-penjamin2-error").html("NIK Kerabat harus diisi.");
                console.log('nik_penjamin2 kosong');
                return false;
            } else if (nik_penjamin2.length > 16 || nik_penjamin2.length < 16) {
                $("#nik_penjamin2").addClass('is-invalid');
                $("#nik_penjamin2").focus();
                $(".nik-penjamin2-error").removeClass('invisible');
                $(".nik-penjamin2-error").addClass('invalid-feedback');
                $(".nik-penjamin2-error").html("NIK harus berisi 16 digit.");
                console.log('nik kurang/lebih dari 16 digit');
                return false;
            } else {
                $("#nik_penjamin2").removeClass('is-invalid');
                $(".nik-penjamin2-error").addClass('invisible');
            }
            if (no_hp_penjamin2 == "" || no_hp_penjamin2 == null) {
                $("#no_hp_penjamin2").addClass('is-invalid');
                $("#no_hp_penjamin2").focus();
                $(".no-hp-penjamin2-error").removeClass('invisible');
                $(".no-hp-penjamin2-error").addClass('invalid-feedback');
                $(".no-hp-penjamin2-error").html("Nomor Handphone Kerabat harus diisi.");
                console.log('hp penjamin perusahaan kosong');
                return false;
            } else {
                $("#no_hp_penjamin2").removeClass('is-invalid');
                $(".no-hp-penjamin2-error").addClass('invisible');
            }
            if (alamat_penjamin2 == "" || alamat_penjamin2 == null) {
                $("#alamat_penjamin2").addClass('is-invalid');
                $("#alamat_penjamin2").focus();
                $(".alamat-penjamin2-error").removeClass('invisible');
                $(".alamat-penjamin2-error").addClass('invalid-feedback');
                $(".alamat-penjamin2-error").html("Alamat Kerabat harus diisi.");
                console.log('alamat_penjamin2 kosong');
                return false;
            } else {
                $("#alamat_penjamin2").removeClass('is-invalid');
                $(".alamat-penjamin2-error").addClass('invisible');
            }
            return true;
        }
    </script>
    <script src="{{ asset('borrower/vendor/form-wizard/main.js') }}"></script>
    <script type="text/javascript">
        function validateKtp() {
            var fileName = document.getElementById("scan_ktp").value;
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                //TO DO
            } else {
                // alert("Only jpg/jpeg and png files are allowed!");
                document.getElementById("scan_ktp").value = '';
                alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
            }
        }

        function validateSelfie() {
            var fileName = document.getElementById("selfie_ktp").value;
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                //TO DO
            } else {
                // alert("Only jpg/jpeg and png files are allowed!");
                document.getElementById("selfie_ktp").value = '';
                alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
            }
        }

        // validation file size 2 MB
        $('#scan_ktp').on('change', function() {
            var numb = $(this)[0].files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);
            if (numb > 2) {
                alert('Ukuran file maksimal 2MB. FIle anda berukuran: ' + numb + ' MB');
                event.target.value = '';
            }
        });

        $('#selfie_ktp').on('change', function() {
            var numb = $(this)[0].files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);
            if (numb > 2) {
                alert('Ukuran file maksimal 2MB. FIle anda berukuran: ' + numb + ' MB');
                event.target.value = '';
            }
        });

        // Geolocation using javascript
        $(document).ready(function() {
            var getPosition = {
                enableHighAccuracy: false,
                timeout: 9000,
                maximumAge: 0
            };

            function success(gotPosition) {
                var uLat = gotPosition.coords.latitude;
                var uLon = gotPosition.coords.longitude;

                // $.ajax({
                //     url : "https://maps.googleapis.com/maps/api/geocode/json?latlng="+uLat+","+uLon+"&key=AIzaSyAEI4oQnAA5ZfvwniJ6YVyHdAZ0CfA7_1w",
                //     success: function (data) {
                //         console.log(data.results[0]);
                //         // console.log(data.results[0].formatted_address);

                //         // $('#alamat').val(data.results[0].formatted_address);
                //     }
                // });

            };

            function error(err) {
                console.warn(`ERROR(${err.code}): ${err.message}`);
            };

            navigator.geolocation.getCurrentPosition(success, error, getPosition);
        });
    </script>
@endpush
