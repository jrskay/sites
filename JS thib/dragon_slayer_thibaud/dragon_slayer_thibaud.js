function getRandomInteger(min, max) {

	return Math.floor(Math.random() * (max - min + 1) + min);

}


function requestInteger(message, min, max)
{
	var integer;

    do {

    	integer = parseInt(window.prompt(message));

    } while ( isNaN(integer)==true ||  integer > max  || integer < min )

    return integer;


}



var game = {};



function initializeGame()
{
	game.difficulty = requestInteger( 'Niveau de difficulté ?\n' + '1. Facile - 2. Normal - 3. Difficile',1, 3);

    switch(game.difficulty)
    {
    	case 1:
			game.hpDragon = getRandomInteger(150, 200);
        	game.hpPlayer = getRandomInteger(200, 250);
        break;

        case 2:
        	game.hpDragon = getRandomInteger(200, 250);
       		game.hpPlayer = getRandomInteger(200, 250);
        break;

        case 3:
        	game.hpDragon = getRandomInteger(200, 250);
        	game.hpPlayer = getRandomInteger(150, 200);
        break;
     }

     game.armor = requestInteger('Armure ?\n' + '1. Cuivre - 2. Fer - 3. Magique', 1, 3);

     if (game.armor == 1) {

     	game.armorRatio = 1;

     } else if (game.armor == 2) {

     	game.armorRatio = 1.25;

     } else {

     	game.armorRatio = 2;

     }

     game.sword = requestInteger('Epée ?\n' +'1. Bois - 2. Acier - 3. Excalibur',1, 3 );

     switch(game.sword){

		case 1:
          game.swordRatio = 0.5;
        break;

        case 2:
       	 game.swordRatio = 1;
        break;

        case 3:
       	 game.swordRatio = 2;
        break;
    }


}

initializeGame();

console.log(game);


function computeDragonDamagePoint()
{
	var damagePoint;

     if(game.difficulty == 1)
    {
        // Le dragon inflige moins de dégâts si le niveau de difficulté est facile.
        damagePoint = getRandomInteger(10, 20);
    }
    else if (game.difficulty == 2)
    {
        damagePoint = getRandomInteger(30, 40);
    } else {

    	damagePoint = getRandomInteger(40, 50);

    }

	return Math.round(damagePoint / game.armorRatio);

}

function computePlayerDamagePoint()
{
    var damagePoint;

    // Les dégâts infligés par le joueur varient selon la difficulté du jeu.
    switch(game.difficulty)
    {
        case LEVEL_EASY:
        damagePoint = getRandomInteger(25, 30);
        break;

        case LEVEL_NORMAL:
        damagePoint = getRandomInteger(15, 20);
        break;

        case LEVEL_HARD:
        damagePoint = getRandomInteger(5, 10);
        break;
    }

    // Calcul du résultat final en fonction de l'épée du joueur.
    return Math.round(damagePoint * game.swordRatio);
}

function gameLoop() {
	var damagePoint;
    var dragonSpeed;
    var playerSpeed;

		while (game.hpDragon > 0 && game.hpPlayer > 0) {

    	dragonSpeed = getRandomInteger(10, 20);
        playerSpeed = getRandomInteger(10, 20);

        if(dragonSpeed > playerSpeed)
        {
        	damagePoint = computeDragonDamagePoint();
					// c'est une autre facon de note ce qui a en bas game.hpPlayer = game.hpPlayer - damagePoint;
        	game.hpPlayer -= damagePoint; //
            console.log
            (
                'Le dragon est plus rapide et vous brûle, il vous enlève ' +
                damagePoint + ' PV'
            );

        } else {
        	damagePoint = computePlayerDamagePoint();
            game.hpDragon -= damagePoint;

            console.log
            (
                'Vous êtes plus rapide et frappez le dragon, vous lui enlevez ' +
                damagePoint + ' PV'
            );
        }
      showGameState();

    }

}

function showGameState()
{
    console.log
    (
        'Dragon : ' + game.hpDragon + ' PV, ' +
        'joueur : ' + game.hpPlayer + ' PV'
    );
}

function showGameWinner()
{
    if(game.hpDragon <= 0)
    {

		document.write('<img src="images/knight.jpg">');
        console.log("Vous avez gagné, vous êtes vraiment fort !");
        console.log("Il vous restait " + game.hpPlayer + " PV");
    }
    else // if(game.hpPlayer <= 0)
    {
		document.write('<img src="images/dragon.jpg">');
        console.log("Le dragon a gagné, vous avez été carbonisé !");
        console.log("Il restait " + game.hpDragon + " PV au dragon");
    }
}

// on fait une fonction que metre toutes les autres dans l'ordre
function start() {
	initializeGame();
	showGameState();
	gameLoop();
	showGameWinner();
}

start();

















































/*

Pour la fonction d'inialize

si difficulté : easy => HP du d entre 150 et 200
						HP du k entre 200 et 250


                medium => HP du d entre 200 et 250
						  HP du k entre 200 et 250

                hard =>   HP du d entre 200 et 250
						  HP du k entre 150 et 200


choix de l'armure :  cuivre => armorRatio => 1
					 fer => armorRatio => 1.25
                     magique => armorRatio => 2


choix de l'arme :  	 bois => weaponRatio => 0.5
					 fer => weaponRatio => 1
                     excalibur => weaponRatio => 2



Pour la fonction dégats fait par le dragon :

si difficulté : easy => degat en 10 et 20

                medium => degat en 30 et 40

                hard =>   degat en 40 et 50

	les dégats sont divisé par le ratioArmor


Pour la fonction dégats fait par le joueur :

si difficulté : easy => degat en 25 et 30

                medium => degat en 15 et 20

                hard =>   degat en 5 et 10

	les dégats sont multiplié par le ratioWeapon



Pour la fonction déroulement du jeu

créer un aléatoire de vitesse pour le dragon et le joueur (même proba), le plus rapide tape

le combat continue jusqu'à ce qu'un des deux ne possède plus de hp



*/
