var button = document.getElementById('toggle-rectangle');
var rectangle = document.querySelector('.rectangle');


function onClickButtonDisplay(){
	rectangle.classList.toggle('hide');
}
button.addEventListener('click', onClickButtonDisplay);
