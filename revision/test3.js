/*
	$('.para').on('click', getData);

    function data()  {

    	var id = $(this).data('id');

    }
*/


var para = document.querySelectorAll('.para');

for (var i =0; i < para.length ; i++) {

	para[i].addEventListener('click', getData);

}

function getData() {

	var id = this.dataset.id;
}
