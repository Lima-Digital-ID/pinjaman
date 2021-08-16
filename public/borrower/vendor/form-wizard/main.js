$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var index = 0;

    function nextStep(parent) {
        current_fs = parent;
        next_fs = parent.next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
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
    
    $(".next").click(function(){
        if(index == 0) {
            console.log('index 0');
            if(validateFormKtp()) {
                console.log('form ktp : '+validateFormKtp());
                nextStep($(this).parent());
            }
            else {
                console.log('form ktp : '+validateFormKtp());
            }
        }
        if(index == 1) {
            console.log('index 1');
            if(validateFormBank()) {
                console.log('form bank : '+validateFormBank());
                nextStep($(this).parent());
            }
            else {
                console.log('form bank : '+validateFormBank());
            }
        }
        if(index == 2) {
            console.log('index 2');
            if(validateFormPekerjaan()) {
                console.log('form pekerjaan : '+validateFormPekerjaan());
                nextStep($(this).parent());
            }
            else {
                console.log('form pekerjaan : '+validateFormPekerjaan());
            }
        }
        if(index == 3) {
            console.log('index 2');
            if(validateFormKontak()) {
                console.log('form pekerjaan : '+validateFormKontak());
                $( "msform" ).submit();
            }
            else {
                console.log('form pekerjaan : '+validateFormKontak());
            }
        }

        if(index == 0) {
            if(validateFormKtp()) {
                if(index < 3) {
                    index = 1;
                    console.log('position : '+ index);
                }
            }
        }

        if(index == 1) {
            if(validateFormBank()) {
                if(index < 3) {
                    index = 2;
                    console.log('position : '+ index);
                }
            }
        }

        if(index == 2) {
            if(validateFormPekerjaan()) {
                if(index < 3) {
                    index = 3;
                    console.log('position : '+ index);
                }
            }
        }

        if(index == 3) {
            if(validateFormKontak()) {
                // alert('sukses');
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