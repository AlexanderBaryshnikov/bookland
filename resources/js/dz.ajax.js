$(document).ready(function() {
    function contactForm()
    {
        window.verifyRecaptchaCallback = function (response) {
            $('input[data-recaptcha]').val(response).trigger('change');
        }

        window.expiredRecaptchaCallback = function () {
            $('input[data-recaptcha]').val("").trigger('change');
        }
        'use strict';
        var msgDiv;
        $(".dzForm").on('submit',function(e)
        {
            e.preventDefault();	//STOP default action
            $('.dzFormMsg').html('<div class="gen alert alert-success">Submitting..</div>');
            var dzFormAction = $(this).attr('action');
            var dzFormData = $(this).serialize();

            $.ajax({
                method: "POST",
                url: dzFormAction,
                data: dzFormData,
                dataType: 'json',
                success: function(dzRes){
                    if(dzRes.status == 1){
                        msgDiv = '<div class="gen alert alert-success">'+dzRes.msg+'</div>';
                    }

                    if(dzRes.status == 0){
                        msgDiv = '<div class="err alert alert-danger">'+dzRes.msg+'</div>';
                    }
                    $('.dzFormMsg').html(msgDiv);


                    setTimeout(function(){
                        $('.dzFormMsg .alert').hide(1000);
                    }, 10000);

                    $('.dzForm')[0].reset();
                    grecaptcha.reset();
                }
            })
        });
    }

    $(document).ready(function() {
        'use strict';
        contactForm();
    })
});

