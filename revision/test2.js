
// Initialisation et déclaration des variables

var index = 0;
var img = document.querySelector('img');
var precedent = document.querySelector('.prev');
var suivant = document.querySelector('.next');
var slider = [ 'amelie.jpg', 'bg.jpg', 'thB.jpg', 'xavier.jpg'];

// Déclaration des évènements

document.addEventListener('DOMContentLoaded', function() {
	precedent.addEventListener('click', onClickPrev);
	suivant.addEventListener('click', onClickNext);
  // En JQuery $('.prev').on('click', goToPrev);
  // En JQuery $('.next').on('click', goToNext);
});

// Déclaration des fonctions

function onClickPrev(e){
  // pour éviter de rachaifir la page et que l'on ne voit pas l'évenement
  e.preventDefault();
  // pour parcourrir le slider dans le sens précédent
  if(index > 0) {
    index--
    } else {
      index = slider.length - 1;
    }
  // la source de l'image sera donc l'index du tableau slider à la fin de la condition
  img.src = 'img/'+slider[index];
  // En JQuery $('img').attr('src', 'img/'+tab[index]);
}

function onClickNext(e){
  // pour éviter de rachaifir la page et que l'on ne voit pas l'évenement
  e.preventDefault();
  // pour parcourrir le slider dans le sens suivant
	if(index < slider.length-1) {
		index++
	} else {
		index = 0;
	}
  // la source de l'image sera donc l'index du tableau slider à la fin de la condition
	img.src = 'img/'+slider[index];
	// En JQuery $('img').attr('src', 'img/'+tab[index]);
}
