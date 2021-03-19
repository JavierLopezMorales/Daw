$(document).ready(function () {

    if($('.name').val().length != 3 || $('.number').val() == null){
        $('.btn-submit').attr('disabled', 'disabled');
        $('.btn-submit').addClass('btn-dis');
    }

    // Pone el texto en mayusculas y compruba si son 3 letras
    $('.name').keyup(function () {

        var text = $('.name').val();
        text = text.toUpperCase();
        $('.name').val(text);

        if($('.name').val().length > 3){
            $('.name').css('color', 'rgb(250, 25, 25)');
            $('.btn-submit').addClass('btn-dis');

            // No dejar enviar mas de 3 letras

            $('.btn-submit').attr('disabled', 'disabled');

        }
        else if($('.name').val().length < 3){
            $('.btn-submit').addClass('btn-dis');

            // No dejar enviar menos de 3 letras

            $('.btn-submit').attr('disabled', 'disabled');
        }
        else{
            $('.name').css('color', 'black');
            $('.btn-submit').prop('disabled', false);
            $('.btn-submit').removeClass('btn-dis');
        }

    })

    $('.number').keyup(function () {

        if($('.number').val() == null || $('.number').val() == ''){
            $('.btn-submit').addClass('btn-dis');

            // No dejar enviar mas de 3 letras

            $('.btn-submit').attr('disabled', 'disabled');

        }
        else{

            $('.btn-submit').prop('disabled', false);
            $('.btn-submit').removeClass('btn-dis');
        }

    })



});