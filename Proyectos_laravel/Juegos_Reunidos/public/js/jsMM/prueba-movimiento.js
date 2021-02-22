$(document).ready(function(){

    var speed;
    var posX = 0;
    var posY = 0;

    // Calcula las coordenadas del player
    function coordinates(){
//        posX = (100 * (parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')) - parseFloat($('#player').css('width')))));
//        posY = 20;
        

        $('.info-top').html( posY + " - "+ speed );
        $('.info-left').html(posY);




    }

    var rSize;
    var dSize;

    // Velocidad a la que el player se mueve, es mas despacio si se mueve en diagonal
    function calcSpeed(){
        if(kd.LEFT.isDown() == true && kd.UP.isDown() == true || kd.LEFT.isDown() == true && kd.DOWN.isDown() == true || kd.UP.isDown() == true && kd.RIGHT.isDown() == true || kd.RIGHT.isDown() == true && kd.DOWN.isDown() == true){
            speed = 0.6;
        }
        else{
            speed =  0.8;
        }
    }

    //coordinates();

    // Mueve el player dependiendo que tecla pulsas
    //IZQ
    kd.LEFT.down(function () { 

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

        calcSpeed();
        if(positionX >= rSize){
            positionX = rSize;

        }
        else{

            positionX = positionX + speed;
        }

        $('#player').css('left', positionX + 'vw');
    });
    //ARR
    kd.UP.down(function () { 
        calcSpeed();
        if(posY <= 0){
            posY = 0;

        }
        else{
            console.log("ANTES posY = " + posY);
            posY = posY - speed;
            console.log("DESPUES posY = " + posY);
        }

        $('#player').css('top', posY + 'vh');
    });
//ABJ
    kd.DOWN.down(function () { 
        calcSpeed();
        if(posY >= dSize){
            posY = dSize;
            $('#player').css('top', posY + 'vh');
        }
        else{
            posY = posY + speed;
            $('#player').css('top', posY + 'vh');
        }
        
        
    });

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
        $('.bullet').css('left', '+=1vw');

        if(parseFloat($('.bullet').css('left')) > parseFloat($('.main-container').css('width'))){
            $('.bullet').first().remove();
        }

        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);

    }



var shoot = true;
var shootTimer = 30;

   // This update loop is the heartbeat of Keydrown
    kd.run(function () {
        kd.tick();

        moveBullet();
        coordinates();

        rSize = 100 - (parseFloat($('#player').css('width'))/parseFloat($('.main-container').css('width'))) * 100;
        dSize = (parseFloat($('.main-container').css('height'))/parseFloat($(window).height())*100) - (parseFloat($('#player').css('height'))/parseFloat($(window).height())) * 100;
        
        if(shootTimer < 30){
            shootTimer++;
            shoot = false;
        }else{
            shoot = true;
        }
        $('.shoot-counter').html('CONTADOR DISPARO: ' + shootTimer);
    });

});

