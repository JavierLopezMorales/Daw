
// Array con los ids de todos los enemigos
var enemyArray = new Array;
var enemyCounter = 0;

var enemySize ;
var mainHeight ;

function spawnEnemy(){
    
    if(spawn == true){
        enemyCounter++;

        // Se añade el id al array
        enemyArray.push(enemyCounter);
    
        // Se crea al enemigo
        $('.main-container').append('<img src="../../images/imagesMM/enemigo1.png" class="enemy" id="enemy' + enemyCounter + '"></img>');
    
        enemySize = (parseFloat($('.enemy#enemy' + enemyCounter).css('height')) / parseFloat($('.main-container').css('height'))) * 100;
        mainHeight = parseFloat(parseFloat($('.main-container').css('height'))/parseFloat($(window).height())*100);
        var spawnEnemy = enemySpawnHeight(enemySize);
        

        $('.enemy#enemy' + enemyCounter).css('left' , '100vw');
        $('.enemy#enemy' + enemyCounter).css('top' , spawnEnemy + 'vh');

        $('.enemy-count').html('NUMERO DE ENEMIGOS: ' + $('.enemy').length);

        spawnTimer = 0;
    }
    
}

var spawnTimeReducer = 0;
var spawn = true;
var spawnTimer = 160;
var spawnSpeed = 30 + Math.floor(Math.random() * 61); 

function enemySpawnSpeed(){
    if(spawnTimer < spawnSpeed){
        spawnTimer++;
        spawn = false;
    }else{
        
        spawn = true;
        if(spawnTimeReducer == 30){
            spawnSpeed = 20 + Math.floor(Math.random() * 11);
        }else{
            spawnSpeed = 30 + Math.floor(Math.random() * 61) - spawnTimeReducer;
            spawnTimeReducer = spawnTimeReducer + 0.1; 
        }
        
    }
    $('.enemy-counter').html('CONTADOR ENEMIGO: ' + spawnTimer);
}

function enemySpawnHeight(size) {
    var number = Math.floor(Math.random() * 10) + 1;
    var heightSpawn = 0;

    switch (number) {
        case 1:
            heightSpawn = 0;
            break;
        case 2:
            heightSpawn = 10 - (size/2);
            break;
        case 3:
            heightSpawn = 20 - (size/2);
            break;
        case 4:
            heightSpawn = 30 - (size/2);
            break;
        case 5:
            heightSpawn = 40 - (size/2);
            break;
        case 6:
            heightSpawn = 60 - (size/2);
            break;
        case 7:
            heightSpawn = 70 - (size/2);
            break;
        case 8:
            heightSpawn = 80 - (size/2);
            break;
        case 9:
            heightSpawn = 90 - (parseFloat($('.game-nav').css('height'))/parseFloat($(window).height())*100) - (size/2);
            break;
        case 10:
            heightSpawn = 101.1 - (parseFloat($('.game-nav').css('height'))/parseFloat($(window).height())*100) - size;
            break;
                                            
        default:
            heightSpawn = heightSpawn = 50 - (size/2);
            break;
    }

    return heightSpawn;

}

var counterExplosion = 0;
var enemyDeath = false;

function explosion() {
    if(counterExplosion < 38 && enemyDeath == true){
        counterExplosion++;
    }else if(counterExplosion >= 38){
        $('.explosion').remove();
        enemyDeath = false;
        
    }
}

function moveEnemy() {
    $('.explosion').css('left', '-=0.1vw');
    $('.enemy').css('left', '-=0.4vw');

    // Eliminar enemigos
    for(var x = 0; x <= enemyArray.length; x++){
        if(parseFloat($('.enemy#enemy' + enemyArray[x]).css('left')) <=  (0-parseFloat($('.enemy#enemy' + enemyArray[x]).css('width')))){
            $('.enemy#enemy' + enemyArray[x]).remove();
            enemyArray.splice(x, 1);
            $('.enemy-count').html('NUMERO DE ENEMIGOS: ' + $('.enemy').length);
            incrementScore(-100);
            health = health - 5;
            if(health <= 0){
                counterExplosion = 0;
                enemyDeath = true;
                kd.UP.unbindDown();
                kd.RIGHT.unbindDown();
                kd.LEFT.unbindDown();
                kd.DOWN.unbindDown();
                $('#player').attr({'src': '../../images/imagesMM/explosion.gif', 'class': 'explosion'});
                game = false;
                audioMusic.pause(); 
                audioMusic.volume = 0; 
                audioHit.load();
                audioExplosion.load(); 
                audioHit.play(); 
                audioExplosion.play(); 
                $('.game-end').css({'display': 'flex', 'opacity': 0.8});
            }else{
                audioHit.load();
                audioExplosion.load(); 
                audioHit.play(); 
                audioExplosion.play(); 
            }
        }
    }

}










