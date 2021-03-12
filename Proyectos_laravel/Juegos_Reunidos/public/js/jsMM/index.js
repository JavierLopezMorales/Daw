// Mientras game sea true el juego continua
var game = true;
var start = false;

if(start == false){


    kd.SPACE.down(function () { 

        start = true;
        $('.game-start').remove();
        audioMusic.play(); 
        audioMusic.volume = 0.2;
        
    });

}
    var posX = 0;
    var posY = 0;
    var rSize;
    var dSize;

    // Calcula las coordenadas del player
    function coordinates(){
        $('.info-top').html(posY);
        $('.info-left').html(posX);
    }

    // Calcula el tamaño de la pantalla
    function size() {
        rSize = ((parseFloat($(window).width())/parseFloat($(window).height())) * 100) - (parseFloat($('#player').css('width'))/parseFloat($(window).height())) * 100;
        dSize = (parseFloat($('.main-container').css('height'))/parseFloat($(window).height())*100) - (parseFloat($('#player').css('height'))/parseFloat($(window).height())) * 100;
    }

    var bonusMultiplier = 0;
    function incrementScore(score) {

        var posMultiplier = parseFloat($('#player').css('left'))/parseFloat($('.main-container').css('width'));
        var multiplier = 1 + bonusMultiplier + posMultiplier;

        // Se añade el multiplicador a la puntuacion
        score = score * multiplier;

        var oldScore = parseFloat($('.score').html());
        var newScore = oldScore + score;

        // Se eliminan los decimales
        newScore = Math.ceil(newScore);

        // Se incrementa el valor
        $('.score').html(newScore);

    }

    var counter = 0;
    function scoreOverTime() {

        if(counter >= 150){
            incrementScore(10);
            counter = 0;
        }else{
            counter++;
        }

    }
    var audioDisparo;
    $(document).ready(function () {
        audioDisparo = document.getElementById("audioDisparo");
        audioExplosion = document.getElementById("audioExplosion");
        audioHit = document.getElementById("audioHit");
        audioMusic = document.getElementById("audioMusic");
    });
    




    // This update loop is the heartbeat of Keydrown
    kd.run(function () {
        kd.tick();
        
        size();
        coordinates();
        moveBullet();
        waitingBulletPosition();

        if(game == true && start == true){


        
            // Spawn de enemigos
            enemySpawnSpeed()
    
            // Movimiento de enemigos y balas
            
            moveEnemy();
            playerHitBox();
            showHealth();
           
            checkHit();
            spawnEnemy();
    
            scoreOverTime();
            
            iFrames();
            

            explosion();
        }
        
    });


   



