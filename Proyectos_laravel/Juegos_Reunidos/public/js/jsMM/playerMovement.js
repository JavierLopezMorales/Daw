
    var speed;

    // Velocidad a la que el player se mueve, es mas despacio si se mueve en diagonal
    function calcSpeed(){
        if(kd.LEFT.isDown() == true && kd.UP.isDown() == true || kd.LEFT.isDown() == true && kd.DOWN.isDown() == true || kd.UP.isDown() == true && kd.RIGHT.isDown() == true || kd.RIGHT.isDown() == true && kd.DOWN.isDown() == true){
            speed = 0.6;
        }
        else{
            speed =  0.8;
        }
    }

    // Mueve el player dependiendo que tecla pulsas
    //IZQUIERDA
    kd.LEFT.down(function () { 

        calcSpeed();
        if(posX <= 0){
            posX = 0;
        }
        else{
            posX = posX - speed;
        }

        $('#player').css('left', posX + 'vh');
        
    });

    //DERECHA
    kd.RIGHT.down(function () {

        calcSpeed();
        if(posX >= rSize){
            posX = rSize;
        }
        else{
            posX = posX + speed;
        }

        $('#player').css('left', posX + 'vh');
    });

    //ARRIBA
    kd.UP.down(function () { 
        calcSpeed();
        if(posY <= 0){
            posY = 0;
        }
        else{
            posY = posY - speed;
        }

        $('#player').css('top', posY + 'vh');
    });

    //ABJAJO
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
