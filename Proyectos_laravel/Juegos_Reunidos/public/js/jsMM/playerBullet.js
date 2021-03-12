function waitingBulletPosition() {
    var bulletWidth = parseFloat($('.bullet').css('width'))/(parseFloat($('.main-container').css('height'))) * 50;
    var bulletHeight = parseFloat($('.bullet').css('height'))/(parseFloat($('.main-container').css('height'))) * 50;
    var bulletX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')))) + (parseFloat($('#player').css('width'))/(parseFloat($('.main-container').css('width'))) * 100) - bulletWidth;
    var bulletY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')))) + (((parseFloat($('#player').css('height'))/2)/(parseFloat($('.main-container').css('height'))) * 100)-bulletHeight);

    $('.waiting-bullet').css({'left': bulletX + 'vw', 'top': bulletY + '%'});

}


    
    kd.A.press(function(){

        if(game == true){

            if(document.getElementsByClassName('waiting-bullet').length == 1){
                audioDisparo.load();  
                audioDisparo.play();    
            }
            
            $('.waiting-bullet').removeClass('waiting-bullet').addClass('move-bullet');

    }
        
    });

var bulletSpeed = 0.5;
function moveBullet(){

    // Se mueven siempre a la derecha a una velocidad
    $('.move-bullet').css('left', '+=' + bulletSpeed + 'vw');

    // Se eliminan las balas que salgan de la pantalla
    if(parseFloat($('.move-bullet').css('left')) > parseFloat($('.main-container').css('width'))){
        $('.move-bullet').removeClass('move-bullet').addClass('waiting-bullet');
    } 
    checkHit();
}

function checkHit(){

    // Posicion y tamaño de la bala
    var positionBulletX = parseFloat(100 * parseFloat($('.move-bullet').css('left')) / (parseFloat($('.main-container').css('height'))));
    var positionBulletY = parseFloat(100 * parseFloat($('.move-bullet').css('top')) / (parseFloat($('.main-container').css('height'))));
    var bulletHeight = parseFloat(parseFloat($('.move-bullet').css('height')) / parseFloat($('.main-container').css('height'))) * 100;
    var bulletWidth = parseFloat(parseFloat($('.move-bullet').css('width')) / parseFloat($('.main-container').css('height'))) * 100;

    for(var en = 0; en < enemyArray.length; en++){

        // Posicion y tamaño de todos los enemigos
        var positionEnemyX = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionEnemyY = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('top')) / (parseFloat($('.main-container').css('height'))));
        var enemyHeight = parseFloat($('.enemy#enemy' + enemyArray[en]).css('height')) / parseFloat($('.main-container').css('height')) * 100;
        var enemyWidth = parseFloat($('.enemy#enemy' + enemyArray[en]).css('width')) / parseFloat($('.main-container').css('height')) * 100;

        // Hitbox
        if((positionBulletX + bulletWidth) > positionEnemyX && positionBulletX < (positionEnemyX + enemyWidth) && (positionBulletY + bulletHeight) > positionEnemyY && positionBulletY < (positionEnemyY + enemyHeight))
        {
            // CAMBIAR A FUTURO
            counterExplosion = 0;
            enemyDeath = true;
            $('.main-container').append('<img src="" class="explosion"></img>');
            $('.explosion').css({'top': positionEnemyY + '%', 'left':  positionEnemyX-enemyWidth + 'vh', 'height': enemyHeight + 'vh'});
            $('.explosion').attr('src', '../../images/imagesMM/explosion.gif')
            $('.enemy#enemy' + enemyArray[en]).remove();
            audioExplosion.load(); 
            audioExplosion.play(); 

            enemyArray.splice(en, 1);
            $('.move-bullet').removeClass('move-bullet').addClass('waiting-bullet');
            incrementScore(100);
        }

    }

}


