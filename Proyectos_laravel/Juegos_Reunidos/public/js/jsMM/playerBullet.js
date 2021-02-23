
   
    // DISPARO
   kd.A.down(function () {
    // Al disparar se crea un div que avanza hasta el final de la pantalla
        if(shoot == true){
            $('.main-container').append('<div class="bullet"></div>');
            bulletMovement();
            shootTimer = 0;
            $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);
        }
    });

    var bulletX;
    var bulletY;
    var counterBullet = 0;
    var shoot = true;
    var shootTimer = 30;

    function bulletMovement(){
        //Se crea la bala
        counterBullet++;
        $('.bullet').last().attr('id',  counterBullet);

        // La mitad de la altura de la bala, para poder centrarlo en la nave
        var bulletHeight = parseFloat($('.bullet').css('height'))/(parseFloat($('.main-container').css('height'))) * 50;

        // Coordenadas de aparicion de la bala
        bulletX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')))) + (parseFloat($('#player').css('width'))/(parseFloat($('.main-container').css('width'))) * 100);
        bulletY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')))) + (((parseFloat($('#player').css('height'))/2)/(parseFloat($('.main-container').css('height'))) * 100)-bulletHeight);
        $('#' + counterBullet).css('left' , bulletX + 'vw');
        $('#' + counterBullet).css('top' , bulletY + '%');
    }

    // Incrementar la posicion de la bala
    function moveBullet(){
        $('.bullet').css('left', '+=0.5vw');

        if(parseFloat($('.bullet').css('left')) > parseFloat($('.main-container').css('width'))){
            $('.bullet').first().remove();
        }

        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);

    }

    // Velocidad de ataque seleccionable
    function atkSpeed(){
        if(shootTimer < 10){
            shootTimer++;
            shoot = false;
        }else{
            shoot = true;
        }
        $('.shoot-counter').html('CONTADOR DISPARO: ' + shootTimer);
    }

    $(document).ready(function(){
        $('.bullet').draggable({ disabled: true });
        $('.enemigo-prueba').droppable({
            accept: '.bullet', tolerance: 'intersect', over: function(){$(this).css('background', 'red')}
        });
    
    });

    

