
   
    // DISPARO
   kd.A.down(function () {

    // Al disparar se crea un div que avanza hasta el final de la pantalla
        if(shoot == true){
            //Se crea la bala
            counterBullet++;

            // Array con todas los ids de las balas existentes
            bulletArray.push(counterBullet);
            $('.main-container').append('<div class="bullet" id="'+ counterBullet +'"></div>');
            

            shootTimer = 0;
            $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);

            // La mitad de la altura de la bala, para poder centrarlo en la nave
            var bulletHeight = parseFloat($('.bullet').css('height'))/(parseFloat($('.main-container').css('height'))) * 50;

            // Coordenadas de aparicion de la bala
            bulletX = (100 * parseFloat($('#player').css('left')) / (parseFloat($('.main-container').css('width')))) + (parseFloat($('#player').css('width'))/(parseFloat($('.main-container').css('width'))) * 100);
            bulletY = (100 * parseFloat($('#player').css('top')) / (parseFloat($('.main-container').css('height')))) + (((parseFloat($('#player').css('height'))/2)/(parseFloat($('.main-container').css('height'))) * 100)-bulletHeight);
            $('.bullet#' + counterBullet).css('left' , bulletX + 'vw');
            $('.bullet#' + counterBullet).css('top' , bulletY + '%');
            
        }

    });

    var bulletX;
    var bulletY;
    var counterBullet = 0;
    var shoot = true;
    var shootTimer = 10;

    var bulletArray = new Array;

    // Incrementar la posicion de la bala
    function moveBullet(){
        $('.bullet').css('left', '+=0.1vw');

        // Se eliminan las balas que salgan de la pantalla
        for(var x = 0; x <= bulletArray.length; x++){
            if(parseFloat($('.bullet#' + bulletArray[x]).css('left')) > parseFloat($('.main-container').css('width'))){
                $('.bullet#' + bulletArray[x]).remove();
            }
        }

        $('.bullet-count').html('NUMERO DE BALAS: ' + $('.bullet').length);
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

