
function boostSelection() {

    var boostNumber = Math.floor(Math.random() * boostList.length);

    var boostName = boostList[boostNumber][0];
    var boostAmount = boostList[boostNumber][1];
    var boostIcon = boostList[boostNumber][2];
    var boostSelector = boostList[boostNumber][3];

    createBoost(boostName, boostAmount, boostIcon, boostSelector);

}

function boostEfect(amount, selector) {

    switch (selector) {
        case 'player-speed':

            playerSpeed = parseFloat(playerSpeed) + parseFloat(amount);

            break;
        case 'bullet-speed':

            bulletSpeed = parseFloat(bulletSpeed) + parseFloat(amount);
            
            break;
        case 'health':

            health = health + parseInt(amount);
            
            break;
        case 'shield':

            totaliFrames = 60 * parseInt(amount);
            invincible = true;
            icounter = 0;
                
            break;
        case 'double-points':

            counterTimer = 0;
            bonusMultiplier = 1;
            bonusTimer = 60 * parseInt(amount);
            bonus = true;

            break;

        case 'nuke':

            counterExplosion = 0;
            enemyDeath = true;
            $('.enemy').attr({'src': '../../images/imagesMM/explosion.gif', 'class': 'explosion'});
            enemyArray = [];
            audioExplosion.load();
            audioExplosion.play();
    
            break;
        // NUKE

        default:
            break;
    }

}

var boostArray = new Array;
var boostContainer = new Array;
var boostCounter = 0;

function createBoost(name, amount, icon, selector) {
    boostCounter++;
    
    boostContainer = [boostCounter, name, amount, selector];
    boostArray.push(boostContainer);

    $('.main-container').append('<img src="../../images/imagesMM/icons/' + icon + '" class="boost ' + selector + '" id="boost' + boostCounter + '"></img>');

    var boostSize = (parseFloat($('.boost#boost' + boostCounter).css('height')) / parseFloat($('.main-container').css('height'))) * 100;
    var spawnBoost = enemySpawnHeight(boostSize);

    $('.boost#boost' + boostCounter).css('left' , '100vw');
    $('.boost#boost' + boostCounter).css('top' , spawnBoost + 'vh');


    
}

function moveBoost() {

    $('.boost').css('left', '-=0.2vw');

    for(var x = 0; x < boostArray.length; x++){
        if(parseFloat($('.boost#boost' + boostArray[x][0]).css('left')) <=  (0-parseFloat($('.boost#boost' + boostArray[x][0]).css('width')))){
            $('.boost#boost' + boostArray[x][0]).remove();
            boostArray.splice(x, 1);
        }
    }

}

function checkBoostHit() { 



    for(var en = 0; en <= boostArray.length; en++){

        var positionPlayerX = parseFloat(100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionPlayerY = parseFloat(100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height'))));
        var playerHeight = parseFloat($('#player').css('height')) / parseFloat($('.main-container').css('height')) * 100;
        var playerWidth = parseFloat($('#player').css('width')) / parseFloat($('.main-container').css('height')) * 100;
    
        var positionBulletX = parseFloat(100 * parseFloat($('.move-bullet').css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionBulletY = parseFloat(100 * parseFloat($('.move-bullet').css('top')) / (parseFloat($('.main-container').css('height'))));
        var bulletHeight = parseFloat(parseFloat($('.move-bullet').css('height')) / parseFloat($('.main-container').css('height'))) * 100;
        var bulletWidth = parseFloat(parseFloat($('.move-bullet').css('width')) / parseFloat($('.main-container').css('height'))) * 100;

        // Posicion y tamaño de todos los enemigos
        var positionBoostX = parseFloat(100 * parseFloat($('.boost#boost' + boostArray[en]).css('left')) / (parseFloat($('.main-container').css('height'))));
        var positionBoostY = parseFloat(100 * parseFloat($('.boost#boost' + boostArray[en]).css('top')) / (parseFloat($('.main-container').css('height'))));
        var boostHeight = parseFloat($('.boost#boost' + boostArray[en]).css('height')) / parseFloat($('.main-container').css('height')) * 100;
        var boostWidth = parseFloat($('.boost#boost' + boostArray[en]).css('width')) / parseFloat($('.main-container').css('height')) * 100;

        // Hitbox
        if((positionPlayerX + playerWidth) > positionBoostX && positionPlayerX < (positionBoostX + boostWidth) && (positionPlayerY + playerHeight) > positionBoostY && positionPlayerY < (positionBoostY + boostHeight))
        {
            audioPowerUp.load();
            audioPowerUp.play();

            boostEfect(boostArray[en][2], boostArray[en][3]);
            $('.boost#boost' + boostArray[en][0]).remove();
            boostArray.splice(en, 1);
        }
        else if((positionBulletX + bulletWidth) > positionBoostX && positionBulletX < (positionBoostX + boostWidth) && (positionBulletY + bulletHeight) > positionBoostY && positionBulletY < (positionBoostY + boostHeight)){
            audioPowerUp.load();
            audioPowerUp.play();

            boostEfect(boostArray[en][2], boostArray[en][3]);
            $('.boost#boost' + boostArray[en][0]).remove();
            boostArray.splice(en, 1);
            $('.move-bullet').removeClass('move-bullet').addClass('waiting-bullet')
        }
    }



}

