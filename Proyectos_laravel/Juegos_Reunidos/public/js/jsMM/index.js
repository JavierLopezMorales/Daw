
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


    // This update loop is the heartbeat of Keydrown
    kd.run(function () {
        kd.tick();

        coordinates();
        size();

        // velocidad de disparo y spawn de enemigos
        //atkSpeed();
        enemySpawnSpeed()

        // movimiento de enemigos y balas
        waitingBulletPosition();
        moveEnemy();
        moveBullet();

        checkHit();
        spawnEnemy();
    });


   



