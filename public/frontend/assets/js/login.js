// JavaScript Document
jQuery(document).ready(function($) {
    // set up event close model
    $('.close-modal').click(function() {
        $('#modal-forgot-password-success').addClass('hidden');
    });

    $('#form-login input').keyup(function(){
        if ($('input[name="email"]').val().length > 0 &&
            $('input[name="password"]').val().length > 0 ) {
            $('#btn-login').removeAttr("disabled")
        } else {
            $('#btn-login').attr("disabled", true)
        }
    });

    $('#form-forgot-password input').keyup(function(){
        if ($('input[name="email"]').val().length > 0) {
            $('#btn-forgot-password').removeAttr("disabled")
        } else {
            $('#btn-forgot-password').attr("disabled", true)
        }
    });
});
