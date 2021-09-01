$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var index = 0;

    function nextStep(parent) {
        current_fs = parent;
        next_fs = parent.next();
        
        //Add Class Active
        // $("#previous").eq($("fieldset").index(next_fs)).removeClass("d-none");
        // $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        console.log('next fs ' + next_fs);
        
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
            'display': 'none',
            'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    }

    function previousStep(parent) {
        current_fs = parent;
        previous_fs = parent.prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
        
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    }
    


    $(".selanjutnya-1").click(function(){

        // variable Analisa Character
        var jenkel = document.querySelector(
            'input[name="apa-jenis-kelamin-anda"]:checked'
        );

        var status = document.querySelector(
            'input[name="apakah-status-pernikahan-anda-saat-ini"]:checked'
        );

        var jmlTanggungan = document.querySelector(
            'input[name="berapa-jumlah-tanggungan-anda-saat-ini"]:checked'
        );

        var pendidikan = document.querySelector(
            'input[name="apa-pendidikan-tertanggung-saat-ini"]:checked'
        );

        var usia = document.querySelector(
            'input[name="berapa-usia-peminjam-saat-ini"]:checked'
        );

        // Analisa Capacity
        var pendidikanTerakhir = document.querySelector(
            'input[name="apa-pendidikan-terakhir-anda"]:checked'
        );

        var pekerjaanSaatIni = document.querySelector(
            'input[name="apa-jenis-pekerjaan-saat-ini"]:checked'
        );

        var lamaBekerja = document.querySelector(
            'input[name="sudah-berapa-lama-anda-bekerja"]:checked'
        );
        
        var statusPekerjaan = document.querySelector(
            'input[name="apa-status-pekerjaan-saat-ini"]:checked'
        );
        
        var tujuanPinjaman = document.querySelector(
            'input[name="apa-tujuan-pinjaman-anda"]:checked'
        );

        // Analisa Repayment Capacity
        var nilaiAsset = document.querySelector(
            'input[name="berapa-nilai-aset-yang-anda-butuhkan"]:checked'
        );

        var penghasilanGaji = document.querySelector(
            'input[name="berapa-penghasilan-gaji-yang-anda-dapatkan"]:checked'
        );

        var pengeluaranBiaya = document.querySelector(
            'input[name="berapa-pengeluaran-biaya-rumah-tangga"]:checked'
        );
        
        // Aspek Condition
        var pinjamanBank = document.querySelector(
            'input[name="apakah-ada-pinjaman-di-banklembaga-keuangan-lain"]:checked'
        );

        var kodisiKredit = document.querySelector(
            'input[name="bagaimana-kondisi-kredit-saat-ini"]:checked'
        );

        var totalAngsuran = document.querySelector(
            'input[name="berapa-total-angsuran-banklembaga-keuangan-lain"]:checked'
        );

        if(index == 0) {
        
            // kondisi validation
            if (jenkel == null || status == null || jmlTanggungan == null || pendidikan == null || usia == null) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Maaf harap diisi dengan lengkap untuk ke menu selanjutnya!',
                    icon: 'warning',
                    confirmButtonText: 'Baik'
                });
            }else {
                // jika terisi semua maka next
                nextStep($(this).parent());
                index = 1;
                return;
            }
        }

        if(index == 1) {
            if (pendidikanTerakhir == null || pekerjaanSaatIni == null || lamaBekerja == null || statusPekerjaan == null || tujuanPinjaman == null) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Maaf harap diisi dengan lengkap untuk ke menu selanjutnya!',
                    icon: 'warning',
                    confirmButtonText: 'Baik'
                });
            } else {
                // jika terisi semua maka next
                nextStep($(this).parent());
                index = 2;
                return;
            }
        }

        if(index == 2) {

            if (nilaiAsset == null || penghasilanGaji == null || pengeluaranBiaya == null) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Maaf harap diisi dengan lengkap untuk ke menu selanjutnya!',
                    icon: 'warning',
                    confirmButtonText: 'Baik'
                });
            } else {
                nextStep($(this).parent());
                index = 3;
                return;
            }
        }
        if(index == 3) {
            if (pinjamanBank == null || kodisiKredit == null || totalAngsuran == null) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Maaf harap diisi dengan lengkap untuk ke menu selanjutnya!',
                    icon: 'warning',
                    confirmButtonText: 'Baik'
                });
            }
        }
    });
    
    $(".previous").click(function(){
        previousStep($(this).parent());
        
        if(index > 0) {
            index--;
            console.log('position : '+ index);
        }
    });
    
    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
    
    });