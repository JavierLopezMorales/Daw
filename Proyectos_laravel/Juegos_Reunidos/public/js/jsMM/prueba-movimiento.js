var speed;

    function calcSpeed(){
        if(kd.LEFT.isDown() == true && kd.UP.isDown() == true || kd.LEFT.isDown() == true && kd.DOWN.isDown() == true || kd.UP.isDown() == true && kd.RIGHT.isDown() == true || kd.RIGHT.isDown() == true && kd.DOWN.isDown() == true){
            speed = 8;
        }
        else{
            speed = 10;
        }
    }

    kd.LEFT.down(function () {
        calcSpeed();
        var x = parseFloat($('#player').css('left'));
        x -= speed;
        $('#player').css('left', x + 'px');

   });

   kd.UP.down(function () {
    calcSpeed();
        var x = parseFloat($('#player').css('top'));
        x -= speed;
        $('#player').css('top', x + 'px');

   });

   kd.RIGHT.down(function () {
    calcSpeed();
        var x = parseFloat($('#player').css('left'));
        x += speed;
        $('#player').css('left', x + 'px');

   });

   kd.DOWN.down(function () {
    calcSpeed();
        var x = parseFloat($('#player').css('top'));
        x += speed;
        $('#player').css('top', x + 'px');

   });

   // This update loop is the heartbeat of Keydrown
   kd.run(function () {
     kd.tick();
   });