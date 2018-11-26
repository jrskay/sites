'use strict';

var game = {};

function initializeGame() {
    game.Difficulty = requestInteger('Choisissez votre niveau de difficulté 1- facile 2 - moyen 3 - difficile', 1, 3);

    switch(game.Difficulty) {
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
    game.Armor = requestInteger('Choisissez votre armure 1-  en cuire 2 - en fer 3 - magique', 1, 3);
    switch(game.Armor) {
      case 1:
      game.ratioArmor = 1;
      break;
      case 2:
      game.ratioArmor = 1.25;
      break;
      case 3:
      game.ratioArmor = 2;
      break;
    }
    game.weapon = requestInteger('Choisissez votre épée 1-  en bois 2 - en fer 3 - l\'excalibur', 1, 3);
    switch(game.Weapon) {
      case 1:
      game.ratioWeapon = 0.5;
      break;
      case 2:
      game.ratioWeapon = 1;
      break;
      case 3:
      game.ratioWeapon = 2;
      break;
    }
    console.log(game);
}
initializeGame();

function damageDragon(){
  var damage;
  switch(game.Difficulty) {
    case 1:
    damage = getRandomInteger(10, 20);
    break;

    case 2:
    damage = getRandomInteger(30, 40);
    break;

    case 3:
    damage = getRandomInteger(40, 50);
    break;
  }

  damage = damage / game.ratioArmor;
  return damage;
}

function damagePlayer(){
  var damage;
  switch(game.Difficulty) {
    case 1:
    damage= getRandomInteger(25, 30);
    break;

    case 2:
    damage= getRandomInteger(15, 20);
    break;

    case 3:
    damage= getRandomInteger(5, 10);
    break;
  }
  damage = damage* game.ratioWeapon;
  return damage;
}

function battle(){
  do {
    var Vplayer = getRandomInteger(20, 30);
    var Vdragon = getRandomInteger(20, 30);
    if (Vplayer > Vdragon){
      game.hpDragon = game.hpDragon - damagePlayer();
    } else (Vplayer < Vdragon)
      game.hpPlayer = game.hpPlayer - damageDragon();

  } while(game.hpDragon <= 0 && game.hpPlayer <= 0)
}
battle();
console.log(battle);


// var level = window.prompt('veuillez choisir le niveau facile, normal ou difficile ?')
//
// var armer = window.prompt('veuillez choisir votre armure cuivre, fer ou magique ?')
//
// var weapon = window.prompt('veuillez choisir votre épéé bois, fer ou excalibur ?')

// function AleatoireHp(max,min){
//   // on fait un return pour chopper une valeur aléatoire puis
//   return Math.floor(Math.random() * (max - min) + min);
// }
// // c'est là que l'on déclare la valeur min et max
// console.log(AleatoireHp(200,150));
//
// var level = window.prompt('veuillez choisir le niveau facile, normal ou difficile ?')
//
// console.log(level);
// var blade;
//
// var value = requestInteger('choisissez votre arme entre 1 et 3', 1, 3);
//
// var protection = requestInteger('choisissez votre armure entre 1 et 3', 1, 3);
//
// if (value = 1) {
//   document.write('vous avez choisi' + value);
// }
//
// switch(dutyweapon) {
// 	case : blade = 1
//     document.write('Vous avez choisi l\'épée en bois');
//   // break pour stopper apres la condition est vrai
//   break;
//   case : blade = 2
//     document.write('Vous avez choisi l\'épée en fer');
//   // break pour stopper apres la condition est vrai
//   break;
//   case : blade = 3
//     document.write('Vous avez choisi l\'épée excalibur');
//   break;
// }
//
// switch(dutyarmer) {
// 	case : blade = 1
//     document.write('Vous avez choisi l\'armure en cuivr'e);
//   // break pour stopper apres la condition est vrai
//   break;
//   case : blade = 2
//     document.write('Vous avez choisi l\'épée en fer');
//   // break pour stopper apres la condition est vrai
//   break;
//   case : blade = 3
//     document.write('Vous avez choisi l\'épée excalibur');
//   break;
// }
// var game = {};
// /*game.hpDragon = 0;
// game.hpPlayer = 0;*/
