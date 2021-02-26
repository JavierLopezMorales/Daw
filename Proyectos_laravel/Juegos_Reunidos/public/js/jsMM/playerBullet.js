
    var bulletX;
    var bulletY;
    var shoot = true;
    var shootTimer = 10;

    var bulletArray = new Array;

    // Incrementar la posicion de la bala
    function moveBullet(){
        $('.move-bullet').css('left', '+=0.4vw');

        // Se eliminan las balas que salgan de la pantalla
        for(var x = 0; x <= bulletArray.length; x++){
            if(parseFloat($('.move-bullet#bullet' + bulletArray[x]).css('left')) > parseFloat($('.main-container').css('width'))){
                $('.move-bullet#bullet' + bulletArray[x]).removeClass('move-bullet').addClass('unused-bullet');
            }
        }

        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.move-bullet').length);
    }

    // Velocidad de ataque seleccionable
    function atkSpeed(){
        if(shootTimer < 10){
            shootTimer++;
            shoot = false;
        }else{
            shoot = true;
        }
        $('.shoot-counter').html('CONTADOR DISPARO: ' + shootTimer);
    }





$(document).ready(function(){
    for(var filler = 1; filler <= 50; filler++){
        $('.main-container').append('<div class="bullet unused-bullet" id="bullet'+ filler +'"></div>');
    }
});

var counterBullet = 0;
kd.A.down(function(){

    if(shoot == true){
        console.log(counterBullet);
        counterBullet++;
        shootTimer = 0;
        console.log(counterBullet);
        // Numero de balas mostrado en pantalla
        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.move-bullet').length);

        // Se meten en el array los ids de las balas que han sido disparadas
        bulletArray.push(counterBullet);

        // La mitad de la altura de la bala, para poder centrarlo en la nave
        bulletHeight = parseFloat($('.bullet').css('height'))/(parseFloat($('.main-container').css('height'))) * 50;

        // Coordenadas de la nave para centrar las balas
        bulletX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')))) + (parseFloat($('#player').css('width'))/(parseFloat($('.main-container').css('width'))) * 100);
        bulletY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')))) + (((parseFloat($('#player').css('height'))/2)/(parseFloat($('.main-container').css('height'))) * 100)-bulletHeight);

        // Se le asigna la posicion a las balas disparadas
        $('.bullet#bullet' + counterBullet).css({'left': bulletX + 'vw', 'top': bulletY + '%'});
        $('.bullet#bullet' + counterBullet).removeClass('unused-bullet').addClass('move-bullet');

        
        if(counterBullet >= 50){
            counterBullet = 0;
        }
        
    }
    

});