function waitingBulletPosition() {
    var bulletWidth = parseFloat($('.bullet').css('width'))/(parseFloat($('.main-container').css('height'))) * 50;
    var bulletHeight = parseFloat($('.bullet').css('height'))/(parseFloat($('.main-container').css('height'))) * 50;
    var bulletX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')))) + (parseFloat($('#player').css('width'))/(parseFloat($('.main-container').css('width'))) * 100) - bulletWidth;
    var bulletY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')))) + (((parseFloat($('#player').css('height'))/2)/(parseFloat($('.main-container').css('height'))) * 100)-bulletHeight);

    $('.waiting-bullet').css({'left': bulletX + 'vw', 'top': bulletY + '%'});

}

kd.A.press(function(){

    $('.waiting-bullet').removeClass('waiting-bullet').addClass('move-bullet');

});

function moveBullet(){

    $('.move-bullet').css('left', '+=0.4vw');

    // Se eliminan las balas que salgan de la pantalla
    if(parseFloat($('.move-bullet').css('left')) > parseFloat($('.main-container').css('width'))){
        $('.move-bullet').removeClass('move-bullet').addClass('waiting-bullet');
    } 
    checkHit();
}

function checkHit(){

    var positionBulletX = parseFloat(100 * parseFloat($('.move-bullet').css('left')) / (parseFloat($('.main-container').css('height'))));
    var positionBulletY = parseFloat(100 * parseFloat($('.move-bullet').css('top')) / (parseFloat($('.main-container').css('height'))));
    var bulletHeight = parseFloat(parseFloat($('.move-bullet').css('height')) / parseFloat($('.main-container').css('height'))) * 100;
    var bulletWidth = parseFloat(parseFloat($('.move-bullet').css('width')) / parseFloat($('.main-container').css('height'))) * 100;

    console.log('Posicion bala: x -' + positionBulletX + ' - y - ' + positionBulletY + ' - HEIGHT - ' + bulletHeight + ' - WIDTH - ' + bulletWidth);

    for(var en = 0; en < enemyArray.length; en++){

        var positionEnemyX = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionEnemyY = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('top')) / (parseFloat($('.main-container').css('height'))));
        var enemyHeight = parseFloat($('.enemy#enemy' + enemyArray[en]).css('height')) / parseFloat($('.main-container').css('height')) * 100;
        var enemyWidth = parseFloat($('.enemy#enemy' + enemyArray[en]).css('width')) / parseFloat($('.main-container').css('height')) * 100;


        if((positionBulletX + bulletWidth) > positionEnemyX && positionBulletX < (positionEnemyX + enemyWidth) && (positionBulletY + bulletHeight) > positionEnemyY && positionBulletY < (positionEnemyY + enemyHeight))
        {
            // CAMBIAR A FUTURO
            $('.enemy#enemy' + enemyArray[en]).remove();
            enemyArray.splice(en, 1);
            $('.move-bullet').removeClass('move-bullet').addClass('waiting-bullet');
        }

    }
    /*
    for(var en = 0; en < enemyArray.length; en++){

        var positionEnemyX = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('left')) / (parseFloat($('.main-container').css('width'))));
        var positionEnemyY = parseFloat(100 * parseFloat($('.enemy#enemy' + enemyArray[en]).css('top')) / (parseFloat($('.main-container').css('height'))));
        var enemyHeight = parseFloat(parseFloat($('.enemy#enemy' + enemyArray[en]).css('height')) / parseFloat($('.main-container').css('height'))) * 100;
        var enemyWidth = parseFloat(parseFloat($('.enemy#enemy' + enemyArray[en]).css('width')) / parseFloat($('.main-container').css('height'))) * 100;


        // Ver posicion de la bala, de igual manera que del enemigo

        for(var bu = 0; bu < document.getElementsByClassName('bullet').length; bu++){

            var positionBulletX = parseFloat(100 * parseFloat($('.bullet#bullet' + bu).css('left')) / (parseFloat($('.main-container').css('width'))));
            var positionBulletY = parseFloat(100 * parseFloat($('.bullet#bullet' + bu).css('top')) / (parseFloat($('.main-container').css('height'))));
            var bulletHeight = parseFloat(parseFloat($('.bullet#bullet' + bu).css('height')) / parseFloat($('.main-container').css('height'))) * 100;
            var bulletWidth = parseFloat(parseFloat($('.bullet#bullet' + bu).css('width')) / parseFloat($('.main-container').css('height'))) * 100;

            if((positionBulletX + bulletWidth) > positionEnemyX && positionBulletX < (positionEnemyX + enemyWidth) && (positionBulletY + bulletHeight) > positionEnemyY && positionEnemyY < (positionEnemyY + enemyHeight))
            {
                // CAMBIAR A FUTURO
                $('.enemy#enemy' + enemyArray[en]).remove();
                $('.bullet#bullet' + bu).css({'left': '150vw', 'top': '150vh'});
            }
        }

    }
*/
}


