window.addEventListener('load', function(){
    var player = document.getElementById('player');
    player.style.top = 	300;
	player.style.left = 300;
    var speed = 3;
    var keyCodes = { left: 'ArrowLeft', up: 'ArrowUp', right: 'ArrowRight', down: 'ArrowDown' };
    var key = [];

    window.addEventListener('keydown', function(e){
        key[e.key] = true;
    });

    window.addEventListener('keyup', function(e){
        key[e.key] = false;
    });

    setInterval(function(){


        //position of the div
        var x = parseInt(player.style.left);
        var y = parseInt(player.style.top);
        
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