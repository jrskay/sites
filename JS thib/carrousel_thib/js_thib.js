// déclaration
var toolbarToggle = document.getElementById('toolbar-toggle');

var toolbar = document.querySelector('#toolbar ul'); // mettre le . ou # car attend selecteur css
var prev = document.getElementById('slider-previous');
var next = document.getElementById('slider-next');
var diapo = document.getElementById('slider-toggle');
var random = document.getElementById('slider-random');
var image = document.querySelector('#slider img');
var fig = document.querySelector('#slider figcaptation');

var slides =
[
    { image: 'images/1.jpg', legend: 'Street Art'          },
    { image: 'images/2.jpg', legend: 'Fast Lane'           },
    { image: 'images/3.jpg', legend: 'Colorful Building'   },
    { image: 'images/4.jpg', legend: 'Skyscrapers'         },
    { image: 'images/5.jpg', legend: 'City by night'       },
    { image: 'images/6.jpg', legend: 'Tour Eiffel la nuit' }
];

var index = 0;
var timer;


// Fonctions
function displayToolbar() {
	toolbar.classList.toggle('hide');
}

function onClickNext() {
	if (index < slides.length-1) {
    	index++;
    } else {
    	index = 0;
    }
    image.src = slides[index].image;
    fig.textContent = slides[index].legend;
}

function onClickPrev() {
	if (index <= 0) {
    	index = slides.length-1;
    } else {
    	index--;
    }
    image.src = slides[index].image;
    fig.textContent = slides[index].legend;
}

function onClickRandom() {
    var randomNumber
    do {
		randomNumber = getRandomInteger(0, 5);
    } while (randomNumber == index);
    index = randomNumber;
    image.src = slides[index].image;
    fig.textContent = slides[index].legend;
}

function getRandomInteger(min, max)
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

function lectureDiapo() {
	if (diapo.classList.conatins('play') == true) {
    	timer = window.setInterval(onClickNext, 1000);
    } else {
    	window.clearInterval(timer);
    }
	diapo.classList.toggle('play');
    diapo.classList.toggle('pause');
    document.querySelector('#slider-toggle i').classList.toggle('fa-play');
    document.querySelector('#slider-toggle i').classList.toggle('fa-pause');
}

function keyBoardEvent(event) {
	console.log(event.keyCode);
    switch(event.keyCode) {

        case 37:
            onClickPrev();
        break;

        case 39:
            onClickNext();
        break;

        case 32:
        	lectureDiapo();
        break;

        case 82:
        	onClickRandom()
        break;

        default:
        	console.log('pas d\'event associé à cette touche');
        break;
    }
}
// 'DOMContentLoaded' est une sécurite on attend que toute la page soit charger pour pouvoir executer les évenements
document.addEventListener('DOMContentLoaded', function()
{
    toolbarToggle.addEventListener('click', displayToolbar);
    next.addEventListener('click', onClickNext);
    prev.addEventListener('click', onClickPrev);
    random.addEventListener('click', onClickRandom);
    diapo.addEventListener('click', lectureDiapo());
    document.addEventListener('keyup', keyBoardEvent);

});

// instruction
