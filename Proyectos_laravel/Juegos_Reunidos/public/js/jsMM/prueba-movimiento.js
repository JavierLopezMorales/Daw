window.addEventListener('load', function(){
    var player = document.getElementById('player');
    var speed = 10;
    var keyCodes = { left: 'A', up: 38, right: 39, down: 40 };
    var key = [];

    window.addEventListener('keydown', function(evt){
        player.style.backgroundColor = 'red';
        key[evt.key] = true;
    });

    window.addEventListener('keyup', function(evt){
        key[evt.key] = false;
    });

    setInterval(function(){


        //position of the div
        var x = parseInt(player.style.left),
            y = parseInt(player.style.top);
        
        // update position
        // left/right
        if (key[keyCodes.left]) {
            x -= speed;
        } else if (key[keyCodes.right]) {
            x += speed;
        }
        // up/down
        if (key[keyCodes.up]) {
            y -= speed;
        } else if (key[keyCodes.down]) {
            y += speed;
        }
        
        // set div position
        player.style.left = x + 'px';
        player.style.top = y + 'px';
        
    }, 1/30);
});