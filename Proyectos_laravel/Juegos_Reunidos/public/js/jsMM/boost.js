
function boostSelection() {

    var boostNumber = Math.floor(Math.random() * boostList.length);

    var boostName = boostList[boostNumber][0];
    var boostAmount = boostList[boostNumber][1];
    var boostIcon = boostList[boostNumber][2];
    var boostSelector = boostList[boostNumber][3];

    boostEfect(boostName, boostAmount, boostIcon, boostSelector);
    audioPowerUp.load();
    audioPowerUp.play();
}

function boostEfect(name, amount, icon, selector) {

    switch (selector) {
        case 'player-speed':

            playerSpeed = parseFloat(playerSpeed) + parseFloat(amount);

            break;
        case 'bullet-speed':

            bulletSpeed = parseFloat(bulletSpeed) + parseFloat(amount);
            
            break;
        case 'health':

            health = health + parseInt(amount);
            
            break;
        case 'shield':

            totaliFrames = 60 * parseInt(amount);
            invincible = true;
            icounter = 0;
                
            break;
        case 'double-points':
                
            bonusMultiplier = 1;
            bonusTimer = 60 * parseInt(amount);
            bonus = true;

            break;

        // NUKE

        default:
            break;
    }

}

