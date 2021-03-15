// Mientras game sea true el juego continua
var game = true;
var start = false;
var musicCount = 0;

if(start == false){


    kd.SPACE.down(function () { 

        if(musicCount == 0){
            start = true;
            $('.game-start').remove();
            audioMusic.play(); 
            audioMusic.volume = 0.2;
            musicCount = 1;
        }
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
    var bonusTimer = 0;
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

    var bonus = false;
    var counterTimer = 0;
    function bonusScoreTimer() {
        if(counterTimer < bonusTimer && bonusTimer != 0 && bonus == true){
            counterTimer++;
            $('.doublePoints').css('opacity', 1);
        }else{
            $('.doublePoints').css('opacity', 0);
            bonusMultiplier = 0;
            counterTimer=0;
            bonus = false;
            
        }
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
        audioNuke = document.getElementById("audioNuke");
        audioHit = document.getElementById("audioHit");
        audioMusic = document.getElementById("audioMusic");
        audioPowerUp = document.getElementById("audioPowerUp");
    });
    
    kd.M.press(function () { 

        mute();

    });

    function mute() {
        audioMusic = document.getElementById("audioMusic");
        if(audioMusic.volume > 0){
            audioMusic.volume = 0;
            $('.sound').attr('src', '../../images/imagesMM/icons/volumen-down.png');
        }else{
            audioMusic.volume = 0.2;
            $('.sound').attr('src', '../../images/imagesMM/icons/volumen-up.png');
        }
    }


    // This update loop is the heartbeat of Keydrown
    kd.run(function () {
        kd.tick();
        
        size();
        coordinates();
        moveBullet();
        waitingBulletPosition();

        explosion();

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
            bonusScoreTimer();
            moveBoost();
            checkBoostHit();
        }
        
    });


   



