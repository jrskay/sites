function onClickSearchMovie(event) {
	event.preventDefault();
    var movies = $('input[name=search]').val();
    getMovies(movies);

}

$('#send').on('click', onClickSearchMovie);


// moi
function onClickTitleMovie(event){
event.preventDefault();
var id = $(this).data('id');
console.log(id);
 showOneMovie(id);
}
// a retenir: on écoute le document c'est a dire le html car il ne fait pas la fonction si on ne click pas sur le titre du film donc il y a pas la div de
$(document).on('click','#list li', onClickTitleMovie);
