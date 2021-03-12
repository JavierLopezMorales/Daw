
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



    var health = 100;

    function showHealth() {
        // Se incrementa el valor
        $('.health').html(health);

    }


    var invincible = true;
    var icounter = 60;
    
    function iFrames() {
        if(icounter < 60){

            $('#player').css({'border': '0.1vh solid rgba(150, 150, 200, 0.8)', 'border-radius': '35%'});

            invincible = true;
            icounter++;
        }else{
            $('#player').css({'border': 'none', 'border-radius': '0'});
            invincible = false;
        }
    }

function playerHitBox() {

    var positionPlayerX = parseFloat(100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('height'))));
    var positionPlayerY = parseFloat(100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height'))));
    var playerHeight = parseFloat($('#player').css('height')) / parseFloat($('.main-container').css('height')) * 100;
    var playerWidth = parseFloat($('#player').css('width')) / parseFloat($('.main-container').css('height')) * 100;
    
    var hit = false;

    for(var en = 0; en < enemyArray.length; en++){

        // Posicion y tamaño de todos los enemigos
        var positionEnemyX = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionEnemyY = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('top')) / (parseFloat($('.main-container').css('height'))));
        var enemyHeight = parseFloat($('.enemy#enemy' + enemyArray[en]).css('height')) / parseFloat($('.main-container').css('height')) * 100;
        var enemyWidth = parseFloat($('.enemy#enemy' + enemyArray[en]).css('width')) / parseFloat($('.main-container').css('height')) * 100;

        // Hitbox
        if((positionPlayerX + playerWidth) > positionEnemyX && positionPlayerX < (positionEnemyX + enemyWidth) && (positionPlayerY + playerHeight) > positionEnemyY && positionPlayerY < (positionEnemyY + enemyHeight))
        {
            // CAMBIAR A FUTURO
            if(invincible == false){
                icounter = 0;
                health = health - 25;
                if(health > 0){
                    counterExplosion = 0;
                    enemyDeath = true;
                    $('.enemy').attr({'src': '../../images/imagesMM/explosion.gif', 'class': 'explosion'});
                    enemyArray = [];
                    incrementScore(-500);
                    audioHit.load();
                    audioExplosion.load(); 
                    audioHit.play(); 
                    audioExplosion.play(); 
                    
                }
            }
            if(health <= 0){
                kd.UP.unbindDown();
                kd.RIGHT.unbindDown();
                kd.LEFT.unbindDown();
                kd.DOWN.unbindDown();
                hit = true;
                audioMusic.pause(); 
            }
        }

    }

    if(hit == true){
        game = false;
    }

}