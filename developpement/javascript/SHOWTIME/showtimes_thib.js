function position(response) {

	console.log(response);
    var location = response.coords.latitude.toFixed(2)+','+response.coords.longitude.toFixed(2);
    console.log(location);

    var date = new Date();
    requestShowTimesInFrance(params.id, location, date);

}


if(navigator.geolocation) {
	console.log('il y a la géoloc');
    navigator.geolocation.getCurrentPosition(position);


} else {
	console.log('Pas de geoloc');

}




var params = extractUrlParams();

if (params.id == undefined) {

	window.location.href = "http://localhost/dev/showtime.html?id=46793";

}



displayMovieWithId(params.id);

// moi
// cimenaPosition();
