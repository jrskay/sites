//id film = 46793



$.ajax({
        url: 'https://api.internationalshowtimes.com/v4/movies/46793',
        type: 'GET',
        data: {
			"countries": "FR",
        },
        dataType: 'json',
        headers: {
			"X-API-Key": "nce8u3Rq5yNq0jL9FjpmxZ8jWCzv9xvw",
        }
	})
    .done( myFunctionCallBack )
    .fail( function(error) {

    		console.log('la requête a échoué')

     });


function myFunctionCallBack( response ) {
	console.log(response);
  var title = $('<h1>').append(response.movie.original_title);
  var date = $('.p-info').append(response.movie.release_date);
  // var img = $('pocket').attr('src', url_img+response.poster_path).css('width', '500px');
  // var title = $('<h1>').append(response.original_title);
  // var year = $('<h2>').append(response.release_date);
  // var desc = $('<p>').append( response.overview );
  // var note = $('<p>').append( response.vote_average );

  $('.info').html(title);
}
