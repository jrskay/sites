// déclaration
var toolbarToggle = document.getElementById('#toolbar-toggle');
var toolbar = document.querySelector('#toolbar-toggle ul');

var prev = document.getElementById('slider-previous');
var next = document.getElementById('slider-next');
var diapo = document.getElementById('slider-toggle');
var random = document.getElementById('slider-random');

var slides =
[
    { image: 'images/1.jpg', legend: 'Street Art'          },
    { image: 'images/2.jpg', legend: 'Fast Lane'           },
    { image: 'images/3.jpg', legend: 'Colorful Building'   },
    { image: 'images/4.jpg', legend: 'Skyscrapers'         },
    { image: 'images/5.jpg', legend: 'City by night'       },
    { image: 'images/6.jpg', legend: 'Tour Eiffel la nuit' }
];

// Fonctions
function displayToolbar() {
	toolbar.classList.toggle('hide');
}

function onClickNext() {
	if (index > slides.length-1) {
    	index++;
    } else {
    	index = 0;
    }
    image.src = slides[index].image;
    fig.textContent = slides[index].legend;
}

function onClickPrev() {
	if (index < 0) {
    	index = slides.length-1;
    } else {
    	index--;
    }
    image.src = slides[index].image;
    fig.textContent = slides[index].legend;
}

// 'DOMContentLoaded' est une sécurite on attend que toute la page soit charger pour pouvoir executer les évenements
document.addEventListener('DOMContentLoaded', function()
{
    toolbarToggle.addEventListener('click', displayToolbar);
    next.addEventListener('click', onClickNext);
    prev.addEventListener('click', onClickPrev);
});

// instruction
