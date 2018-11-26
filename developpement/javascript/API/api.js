

const API_KEY = '2ee2c5b569240ea2a2a879dd9c8a822c';



function getMovie(event) {
  event.preventDefault();
  var query = $('#search').val();
    console.log(query);
    $.getJSON('https://api.themoviedb.org/3/search/movie?api_key=2ee2c5b569240ea2a2a879dd9c8a822c&query='+query, recupFilm);

    function recupFilm(response) {
      console.log(response);
      $('#list').removeClass('hide');

      var liste = $('<ul>');

      for (var i = 0; i < response.results.length; i++) {
        var result = response.results[i]
        liste.append('<li>'+result.title+'</li>');
      }
      $('#list').html(liste);
    }
}
$('#send').on('click', getMovie);

function movieDetails (event){
  event.preventDefault();
  var fiche = $('#search').val();
  console.log(query);
}
