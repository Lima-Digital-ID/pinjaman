<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Syarat Pinjaman Modal</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('api.syarat.jamod')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="" class="col-md-4">@lang('syarat-jamod.type-of-residence') :</label>
                <div class="col-md-8">
                    <input type="radio" name="tempat_tinggal" id="rumah" value="Rumah Milik Pribadi" required> <label for="rumah">@lang('syarat-jamod.household')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="kos" value="Kos" required> <label for="kos">@lang('syarat-jamod.cost')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="kontrakan" value="Kontrakan" required> <label for="kontrakan">@lang('syarat-jamod.rent')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="apartemen" value="Apartemen" required> <label for="apartemen">@lang('syarat-jamod.apartement')</label> <br>
                    <input type="radio" name="tempat_tinggal" id="lain" value="Lain-lain" required> <label for="lain">@lang('syarat-jamod.etc')</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.family-card')</label>
                        <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" accept=".png, .jpeg" onchange="validateScanKK()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.npwp-attachment')</label>
                        <input type="file" class="form-control" id="scan_npwp" name="scan_npwp" accept=".png, .jpeg" onchange="validateScanNPWP()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.husband-Attachment')</label>
                        <input type="file" class="form-control" id="ktp_suami" name="ktp_suami" accept=".png, .jpeg" onchange="validateKtpSuami()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.wife-attachment')</label>
                        <input type="file" class="form-control" id="ktp_istri" name="ktp_istri" accept=".png, .jpeg" onchange="validateKtpIstri()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.marriage-certificate')</label>
                        <input type="file" class="form-control" id="surat_nikah" name="surat_nikah" accept=".png, .jpeg" onchange="validateSuratNikah()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.BPKB')</label>
                        <input type="file" class="form-control" id="bpkb" name="bpkb" accept=".png, .jpeg" onchange="validateBpkb()" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.domicile')</label>
                        <input type="file" class="form-control" id="domisili_usaha" name="domisili_usaha" accept=".png, .jpeg" onchange="validateDomisili()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.business-NPWP')</label>
                        <input type="file" class="form-control" id="npwp_usaha" name="npwp_usaha" accept=".png, .jpeg" onchange="validateScanNPWPUsaha()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.NIB')</label>
                        <input type="file" class="form-control" id="nib" name="nib" accept=".png, .jpeg" onchange="validateNib()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.notarial')</label>
                        <input type="file" class="form-control" id="akta" name="akta" accept=".png, .jpeg" onchange="validateAkta()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.guarantee')</label>
                        <input type="file" class="form-control" id="scan_jaminan" name="scan_jaminan" accept=".png, .jpeg" onchange="validateJaminan()" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">@lang('syarat-jamod.financial')</label>
                        <input type="file" class="form-control" id="keuangan" name="keuangan" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    @lang('syarat-jamod.btn')
                </button>
            </div>
        </form>
    </div>
</div>

@push('script')
<script type="text/javascript">
    function validateScanKK(){
        var fileName = document.getElementById("kartu_keluarga").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("scan_npwp").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateScanNPWP(){
        var fileName = document.getElementById("scan_npwp").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("scan_npwp").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateKtpSuami(){
        var fileName = document.getElementById("ktp_suami").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("ktp_suami").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateKtpIstri(){
        var fileName = document.getElementById("ktp_istri").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("ktp_istri").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateSuratNikah(){
        var fileName = document.getElementById("surat_nikah").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("surat_nikah").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateBpkb(){
        var fileName = document.getElementById("bpkb").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("bpkb").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateDomisili(){
        var fileName = document.getElementById("domisili_usaha").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("domisili_usaha").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateScanNPWPUsaha(){
        var fileName = document.getElementById("npwp_usaha").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("npwp_usaha").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateNib(){
        var fileName = document.getElementById("nib").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("nib").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateAkta(){
        var fileName = document.getElementById("akta").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("akta").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateJaminan(){
        var fileName = document.getElementById("scan_jaminan").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("scan_jaminan").value = '';
            alert("Hanya file jpg/jpeg dan png yang diperbolehkan!");
        }   
    }
    function validateKeuangan(){
        var fileName = document.getElementById("keuangan").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="pdf"){
            //TO DO
        }else{
            // alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("keuangan").value = '';
            alert("Hanya file pdf dan png yang diperbolehkan!");
        }   
    }
</script>
@endpush