'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* *********************************** FONCTIONS UTILITAIRES *********************************** */
/*************************************************************************************************/



function getRandomInteger(min, max) {
  // return pour récuperer la valeur
// +1 pour arriver jusqu'a 200
	return Math.floor(Math.random() * (max - min + 1) + min);
}


// var test pour pouvoir stocker la valeur de la fonction précédente c'est un test pour voir si tout va bien
// var test = getRandomInteger(1, 3);
// console.log(test);

// on déclare la fonction
function requestInteger(message, min, max)
{
  // on déclare une varaiable que l'on va utiliser pendant la fonction
	var integer;
    // boucle while
    do {
    // on demande l'utilisateur un nombre et on le stocke dans la variable que l'on utilise tout le long de la fonction
    	integer = parseInt(window.prompt(message));
      // tant que c'est pas un nombre ou que le nombre est au dessus du max ou que le nombre est en dessous de min on redemande à l'utilisateur  un nombre
    } while ( isNaN(integer)==true ||  integer > max  || integer < min )
      // on renvoi le nombre donner
    return integer;
}


// value prend les infos  de la fonction requestInteger et on défin le max et le min

// pour regarder la valeur de la fonction et par la meme occasion on la stocke dans value
