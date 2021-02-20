$(document).ready(function(){

    var speed;
    var posX;
    var posY;

    // Calcula las coordenadas del player
    function coordinates(){
        posX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')) - parseFloat($('#player').css('width'))));
        posY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')) - parseFloat($('#player').css('height'))));
        $('.info-left').html(posX);
        $('.info-top').html(posY);
    }

    // Velocidad a la que el player se mueve, es mas despacio si se mueve en diagonal
    function calcSpeed(){
        if(kd.LEFT.isDown() == true && kd.UP.isDown() == true || kd.LEFT.isDown() == true && kd.DOWN.isDown() == true || kd.UP.isDown() == true && kd.RIGHT.isDown() == true || kd.RIGHT.isDown() == true && kd.DOWN.isDown() == true){
            speed = 0.6;
        }
        else{
            speed =  0.8;
        }
    }

    coordinates();
    var positionX = posX; 
    var positionY = posY;

    // Mueve el player dependiendo que tecla pulsas
    //IZQ
    kd.LEFT.down(function () { 
        coordinates();
        calcSpeed();
        if(posX <= 0){
            positionX = 0;
        }
        else{
            positionX = positionX - speed;
        }

        $('#player').css('left', positionX + 'vw');
        
    });
    //DER
    kd.RIGHT.down(function () {
        coordinates();
        calcSpeed();
        if(posX >= 100){
            positionX = 100 - (parseFloat($('#player').css('width'))/parseFloat($('.main-container').css('width'))) * 100;

        }
        else{

            positionX = positionX + speed;
        }

        $('#player').css('left', positionX + 'vw');
    });
    //ARR
    kd.UP.down(function () {
        coordinates();   
        calcSpeed();
        if(posY <= 0){
            positionY = 0;

        }
        else{

            positionY = positionY - speed;
        }

        $('#player').css('top', positionY + 'vw');
    });
//ABJ
    kd.DOWN.down(function () {
        coordinates();   
        calcSpeed();
        if(posY >= 100){
            posY = 100 - (parseFloat($('#player').css('height'))/parseFloat($('.main-container').css('height'))) * 100;
            $('#player').css('top', posY + '%');
        }
        else{

            positionY = positionY + speed;
            $('#player').css('top', positionY + 'vw');
        }

        
    });

    var bulletPos;
   // DISPARO
    kd.S.press(function () {
        $('#player').css('background-color', 'red');

        // Al disparar se crea un div que avanza hasta el final de la pantalla
        $('.main-container').append('<div class="bullet"></div>');
        bulletMovement();
        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);
    });
    var bulletX;
    var bulletY;
    var counterBullet = 0;
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

        // LLAMAR A LA FUNCION PARA MOVER LAS BALAS
        moveBullet(counterBullet);
    }

    function moveBullet(idBullet){
        var pos = (100 * parseFloat($('#' + idBullet).css('left')) / (parseFloat($('.main-container').css('width'))));
        if(pos < 100){
            pos += 1;
            $('#' + idBullet).css('left', pos + 'vw');
        } else{
            $('#' + idBullet).last().remove();
            $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);
        }
    }

    kd.S.up(function(){
        $('#player').css('background-color', 'unset');
    });

    /**
     * CREAR FUNCION PARA QUE LAS BALAS SE MUEVAN AUTOMATICAMENTE JUSTO DESPUES DE CREARLAS
     */


   // This update loop is the heartbeat of Keydrown
    kd.run(function () {
     kd.tick();

     bulletMovement();
    });

});

