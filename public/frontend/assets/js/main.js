// JavaScript Document
jQuery(document).ready(function($) {

    var option = 0;
    var href = '';
    // set up event close model
    $('.close-modal').click(function() {
        $(this).closest('.modal-content').addClass('hidden');
        $('#modal-intro-register input').val('');
        $('#modal-intro-register-popup-2 input,textarea').val('');
        $(".print-error-msg").find("ul").html('');
        $('button[name="submit-step-1"]').attr("disabled", true)
        $('#register_popup2').attr("disabled", true)
        $('#checkbox-intro-register').prop('checked', false);
        $('#checkbox-intro-register-popup-2').prop('checked', false);
        removeErrorMsg();
    });

    $(document).on('click', '.close-modal', function() {

    });

    $('.close-side-bar').click(function(){
        $('.side-bar-smp').addClass('xs:hidden');
    });
    $('.menu-frofile').click(function(){
        $('.side-bar-smp').removeClass('xs:hidden');
    });

    function show_modal(selector) {
        $(selector).removeClass('hidden');
    }
    function hide_modal(selector) {
        $(selector).addClass('hidden');
    }
    $('#register-intro').click(function() {
        option = 0;
        href = $(this).attr('data-href');
        show_modal('#modal-intro-register');
        $('#checkbox-intro-register').click();
    })

    $('#register-intro-popup-1').click(function() {
        show_modal('#modal-intro-register-popup-1');
    })

    /*------------------------------------------------*/

    $('#modal-intro-register input[type="checkbox"]').change(function () {
        if ($(this).is(":checked")) {
            $('button[type="submit"]').removeAttr("disabled")
        } else {
            $('button[type="submit"]').attr("disabled", true)
        }
    });

    $('#modal-intro-register-popup-2 [type="checkbox"]').change(function () {
        if ($(this).is(":checked")) {
            $('button[type="submit"]').removeAttr("disabled")
        } else {
            $('button[type="submit"]').attr("disabled", true)
        }
    });
    /*------------------------------------------------*/

    $('.register-option').click(function (){
        option = $(this).attr('row-option');
        href = $(this).attr('row-href');
        hide_modal('#modal-intro-register-popup-1');
        if (option == 4){
            show_modal('#modal-intro-register-popup-2');
            $('#checkbox-intro-register-popup-2').click();
        }else {
            show_modal('#modal-intro-register');
            $('#checkbox-intro-register').click();
        }
    })
    /*------------------------------------------------*/

    $(document).on('click', '#modal-intro-register .confirm-submit', function (evt) {
        evt.preventDefault();
        $('button[name="submit-step-1"]').attr("disabled", true)
        var first_name = $('input[name="first_name"]').val();
        var last_name = $('input[name="last_name"]').val();
        var email = $('input[name="email"]').val();
        removeErrorMsg();
        registerCustomer(first_name,last_name, email, option,href);
    });

    $(document).on('click', '#modal-intro-register-popup-2 .confirm-submit', function (evt) {
        evt.preventDefault();
        $('button[name="submit-step-1"]').attr("disabled", true)
        var first_name = $('#first_name_popup2').val();
        var last_name = $('#last_name_popup2').val();
        var email = $('#email_popup2').val();
        var desire =  $('#desire_popup2').val();
        removeErrorMsg();
        registerCustomer(first_name,last_name, email, option,href,desire);
    });
    /*------------------------------------------------*/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     *
     * @param recordId
     * @param status
     */
    function registerCustomer (first_name,last_name, email,option,href,desire=null) {
        // set default timezone form client
        var offset = new Date().getTimezoneOffset();
        var time_zone = -(offset / 60);
        $.ajax({
            url: '/register-customer-home',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'email': email,
                'option': option,
                'desire': desire,
                'time_zone': time_zone,
            },
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                if (result.Code == pages.constant.CODE_SUCCESS) {
                    if (option != 4){
                        window.location.href = href + '/' + result.Unique_string;
                    } else {
                        hide_modal('#modal-intro-register-popup-2');
                        show_modal('#modal-intro-register-success');
                        //window.setTimeout( window.location.href = href+'/'+result.Unique_string, 10000 ); // 10 seconds
                    }
                } else {
                    $('button[name="submit-step-1"]').attr("disabled", false)
                    printErrorMsg(result.error,option);
                }
            }
        });
    }
    /*------------------------------------------------*/
    function removeErrorMsg() {
        var inputs = ['full_name', 'email', 'desire'];
        $("#modal-intro-register").find(".invalid-feedback").html('');
        $("#modal-intro-register-popup-2").find(".invalid-feedback").html('');

        $.each(inputs, function (key,value) {
            $('#'+value+'_popup1').removeClass('input-error');
            $('#'+value+'_popup2').removeClass('input-error');
        });
    }
    /*------------------------------------------------*/

    function printErrorMsg (msg,option) {
        if (option == 4) {
            $("#modal-intro-register-popup-2").find(".invalid-feedback").html('');
            $.each(msg, function (key, value) {
                $('#'+key+'_popup2').addClass('input-error');
                $("#modal-intro-register-popup-2").find('.' + key).text(value);
            });
        } else {
            $("#modal-intro-register").find(".invalid-feedback").html('');
            $.each(msg, function (key, value) {
                $('#'+key+'_popup1').addClass('input-error');
                $("#modal-intro-register").find('.' + key).text(value);
            });
        }
    }
});
