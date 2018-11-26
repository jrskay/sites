var photos = document.querySelectorAll('.photo-list li');
var total  = document.querySelector('#total em');


function onClickSelected() {

    this.classList.toggle('selected');

    var selectedPhotos = document.querySelectorAll('.photo-list li.selected');

    console.log(selectedPhotos.length);

	total.textContent = selectedPhotos.length;
}


for (var i = 0; i < photos.length; i++) {

    photos[i].addEventListener('click', onClickSelected);


}
