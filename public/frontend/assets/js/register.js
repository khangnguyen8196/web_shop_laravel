// JavaScript Document
jQuery(document).ready(function($) {
    $('input[name="ref_code"]').keyup(function () {
        var ref_code = $(this).val();
        var slug = new RegExp('^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$');
        if (slug.test(ref_code)) {
            $('.check_ref_code').removeClass('hidden');
        } else {
            $('.check_ref_code').addClass('hidden');
        }
    });

    $('input[name="password"]').keyup(function () {
        var password = $(this).val();
        console.log(password.length);
        var message_min = $(this).data('message-min');
        var message_max = $(this).data('message-max');
        if (password.length < 6) {
            $('#error_password').text(message_min);
        }else if (password.length > 255) {
            $('#error_password').text(message_max);
        }else {
            $('#error_password').text('');
        }
    });

    $('.number-phone').on('keypress', function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    });

    $('input[name="password_confirmation"]').keyup(function () {
        var password = $('input[name="password"]').val();
        var password_confirmation = $(this).val();
        var message_require = $(this).data('message-required');
        var message_same = $(this).data('message-same');
        if (password_confirmation == '') {
            $('#error_password_confirmation').text(message_require);
        } else if (password_confirmation != password) {
            $('#error_password_confirmation').text(message_same);
        } else {
            $('#error_password_confirmation').text('');
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(window).on('load',function (){
        var membership_id = $('input[name="membership"]').val();
        var promotion_code = $('#promotion_code').val();
        if (promotion_code.length > 0){
            getTotalPay(membership_id, promotion_code);
        }
    });

    function show_modal(selector) {
        $(selector).removeClass('hidden');
    }

    function hide_modal(selector) {
        $(selector).addClass('hidden');
    }

    function delete_promotion() {
        show_modal('.register-promotion-input');
        hide_modal('.register-promotion');
        removeErrorMsg();
        $('input[name="promotion_code"]').val('');
    }

    $('#register-promotion-delete').click(function() {
        delete_promotion();
        var id = $('input[name="membership"]').val();
        getTotalPay(id);
    });

    // set up event open model
    $('#register-promotion').click(function() {
        show_modal('#modal-register-promotion');
    })

    // set up event close model
    $('.close-modal').click(function() {
        $(this).closest('.modal-content').addClass('hidden');
        $('input[name="promotion_code"]').val('');
        removeErrorMsg();
    });

    $('#modal-register-promotion input').keyup(function(){
        if ($('input[name="promotion_code"]').val().length > 0 ) {
            $('#submit-promotion').removeAttr("disabled")
        } else {
            $('#submit-promotion').attr("disabled", true)
        }
    });

    $(document).on('click', '#submit-promotion', function (evt) {
        evt.preventDefault();
        var membership_id = $('input[name="membership"]').val();
        var promotion_code = $('input[name="promotion_code"]').val();
        getTotalPay(membership_id, promotion_code);
    });
    /**
     *
     * @param membership_id
     * @param promotion_code
     */
    function getTotalPay(membership_id, promotion_code = null) {
        $.ajax({
            url: '/memberships-info',
            data: {
                'membership_id': membership_id,
                'promotion_code': promotion_code,
            },
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                if (result.Code == pages.constant.CODE_SUCCESS) {
                    if (result.total_promotion_discount > 0){
                        show_modal('.register-promotion');
                        hide_modal('.register-promotion-input');
                        hide_modal('#modal-register-promotion');
                    }
                    if (result.membership_price_discount > 0){
                        $('#membership-price-select').text('$'+parseFloat(result.membership_price_discount).toFixed(2));
                    }else {
                        $('#membership-price-select').text('$'+parseFloat(result.membership_price).toFixed(2));
                    }
                    if (result.total_promotion_discount > 0) {
                        $('#promotion-code').text(promotion_code);
                        $('input[name="promotion_code"]').val(promotion_code);
                        $('#total_promotion_discount').text('-$' + parseFloat(result.total_promotion_discount).toFixed(2));
                    }
                    $('#membership-total_pay-select').text('$'+parseFloat(result.total_pay).toFixed(2))
                } else {
                    $("#modal-register-promotion").find(".invalid-feedback").html('');
                    $('input[name="promotion_code"]').addClass('input-error');
                    $("#modal-register-promotion").find('.promotion_code').text(result.error);
                }
            }
        });
    }
    /*------------------------------------------------*/
    function removeErrorMsg() {
        var inputs = ['promotion_code'];
        $("#modal-register-promotion").find(".invalid-feedback").html('');
        $.each(inputs, function (key,value) {
            $('input[name='+value+']').removeClass('input-error');
        });
    }
    /*------------------------------------------------*/
    $('.term_condition').on('click', function() {
        if ($('.term_condition').is(":checked") == true) {
            disabledPayment(false);
        } else {
            disabledPayment(true);
        }
    });
    setTimeout(() => {
        $('.term_condition').click();
        }, 100);

    $('#register_customer').on('click', function() {
        $('input[name="type_register"]').val('not-trial');
    });

    function disabledPayment(status){
        if (status === true){
            $('#register_customer').addClass('opacity-50 pointer-events-none');
            $('#register_customer_trial').addClass('opacity-50 pointer-events-none');
        } else {
            if ($('#register_customer').hasClass('opacity-50 pointer-events-none')){
                $('#register_customer').removeClass('opacity-50 pointer-events-none');
            }
            if ($('#register_customer_trial').hasClass('opacity-50 pointer-events-none')){
                $('#register_customer_trial').removeClass('opacity-50 pointer-events-none');
            }
        }
    }
});
