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

        if (game == true) {
            var posMultiplier = parseFloat($('#player').css('left'))/parseFloat($('.main-container').css('width'));
            var multiplier = 1 + bonusMultiplier + posMultiplier;

            // Se añade el multiplicador a la puntuacion
            score = score * multiplier;

            var oldScore = parseFloat($('.score').html());
            var newScore = oldScore + score;

            if(newScore < 0){
                newScore = 0;
            }

            // Se eliminan los decimales
            newScore = Math.ceil(newScore);

            // Se incrementa el valor
            $('.score').html(newScore);
        }else{

        }

        
        
    }

    var bonus = false;
    var counterTimer = 0;
    var counterEnemyBonus = 0;
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

        if(counterEnemyBonus == 600){
            boostSelection();
            counterEnemyBonus = 0;
        }else{
            counterEnemyBonus++;
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

    var pause = false;

    kd.P.press(function () { 
        pauseGame();
    });

    function pauseGame() {

        if (pause == false) {
            pause = true;
            $('.option').css('transform', 'translate(-70%, -50%) rotateY(180deg)');
            $('.nav').css('display', 'flex');
            $('sound').css('display', 'none');
        }else{
            pause = false;
            $('.option').css('transform', 'translate(-70%, -50%) rotateY(0deg)');
            $('.nav').css('display', 'none');
            $('sound').css('display', 'flex');
        }

    }

    var totalScore;
    // This update loop is the heartbeat of Keydrown
    kd.run(function () {
        kd.tick();

        showHealth();

        if(pause == false){
        
            size();
            coordinates();
            moveBullet();

            if(game == true && start == true){
                
                if(explode == true){
                    $('.white-explosion').css('z-index', '999');
                    explode = false;
                }else{
                    $('.white-explosion').css('z-index', '-1');
                }
            
                // Spawn de enemigos
                enemySpawnSpeed()
        
                // Movimiento de enemigos y balas
                
                moveEnemy();
                
                
                spawnEnemy();
                checkHit();
                scoreOverTime();
                playerHitBox();
                iFrames();
                bonusScoreTimer();
                moveBoost();
                checkBoostHit();

                totalScore = $('.score').html();
                $('#score').attr('value', totalScore);

            }

            waitingBulletPosition();

            explosion();

        }
        
    });


   



