var rectangle = document.getElementById('rectangle');
var button = document.getElementById('toggle-rectangle');




// ce qui est important dans cette exo c'est de réfléchir a l'envers par exemple:
// rectangle.addEventListener('dblclick' , greenRectangle);
// on va agir dans quoi ? dans le rectangle; on va faire quoi ? un evenement d'ou la liste des evenement; puis quel est l'evenement qui nous interesse ? double clique; on va faire quoi quand cet évenement se produit ? on fait une fonction ? cette fonction c'est quoi ? function greenRectangle(); cette fonction fait quoi{
//  rectangle.classList.add('limegreen'); il prend la variable rectangle déclarer avant puis il va sur la liste de toutes les class du programme et il va soit supprimer soit ajouter soit jouer le role d'interrupteur puis on prend la class qui nous interesse pour faire l'action
// }




console.log(rectangle);

function displayRectangle() {
 rectangle.classList.toggle('hide');
}
button.addEventListener('click' , displayRectangle);

function redRectangle() {
 rectangle.classList.add('firebrick');
}
rectangle.addEventListener('mouseover' , redRectangle);

function removeRectangle() {
 rectangle.classList.remove('firebrick');
 rectangle.classList.remove('limegreen');
}
rectangle.addEventListener('mouseout' , removeRectangle);

function greenRectangle() {
 rectangle.classList.add('limegreen');
}
rectangle.addEventListener('dblclick' , greenRectangle);
