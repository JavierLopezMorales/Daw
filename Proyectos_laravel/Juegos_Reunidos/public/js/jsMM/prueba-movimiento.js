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
    kd.LEFT.down(function () { 
        coordinates();
        calcSpeed();
        if(posX <= 0){
            $('#player').css('background-color', 'blue');

        }
        else{
            $('#player').css('background-color', 'yellow');
            positionX = positionX - speed;
        }

        $('#player').css('left', positionX + 'vw');
        
    });

    kd.RIGHT.down(function () {
        coordinates();
        calcSpeed();
        if(posX >= 100){
            $('#player').css('background-color', 'blue');

        }
        else{
            $('#player').css('background-color', 'yellow');
            positionX = positionX + speed;
        }

        $('#player').css('left', positionX + 'vw');
    });

    kd.UP.down(function () {
        coordinates();   
        calcSpeed();
        if(posY <= 0){
            $('#player').css('background-color', 'blue');

        }
        else{
            $('#player').css('background-color', 'yellow');
            positionY = positionY - speed;
        }

        $('#player').css('top', positionY + 'vw');
    });

    kd.DOWN.down(function () {
        coordinates();   
        calcSpeed();
        if(posY >= 100){
            $('#player').css('background-color', 'blue');

        }
        else{
            $('#player').css('background-color', 'yellow');
            positionY = positionY + speed;
        }

        $('#player').css('top', positionY + 'vw');
    });

   // Funcion para disparar
    kd.SPACE.down(function () {

    $('#player').css('background-color', 'red');

    });
    kd.SPACE.up(function(){
        $('#player').css('background-color', 'yellow');
    });


   // This update loop is the heartbeat of Keydrown
    kd.run(function () {
     kd.tick();
    });

});

