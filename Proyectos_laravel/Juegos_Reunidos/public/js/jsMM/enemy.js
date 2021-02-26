
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
        $('.main-container').append('<div class="enemy" id="enemy' + enemyCounter + '"></div>');
    
        enemySize = (parseFloat($('.enemy#enemy' + enemyCounter).css('height')) / parseFloat($('.main-container').css('height'))) * 100;
        mainHeight = parseFloat(parseFloat($('.main-container').css('height'))/parseFloat($(window).height())*100);

        $('.enemy#enemy' + enemyCounter).css('left' , '110vw');
        $('.enemy#enemy' + enemyCounter).css('top' , rndPos(mainHeight, enemySize) + 'vh');

        spawnTimer = 0;
    }
    
}

function rndPos(mainHeight, enemySize) {
    return parseFloat(Math.floor(Math.random() * ((mainHeight - enemySize) - 5) ) + 5);

  }

var spawn = true;
var spawnTimer = 240;

function enemySpawnSpeed(){
    if(spawnTimer < 240){
        spawnTimer++;
        spawn = false;
    }else{
        spawn = true;
    }
}


function moveEnemy() {
    $('.enemy').css('left', '-=0.1vw');

    for(var x = 0; x <= enemyArray.length; x++){
        if(parseFloat($('.enemy#enemy' + enemyArray[x]).css('left')) <=  -500){
            $('.enemy#enemy' + enemyArray[x]).remove();
        }
    }
}








