
$.ajax({
    url: "https://api.internationalshowtimes.com/v4/movies/12",
    type: "GET",
    datatype: "json",
    data: {
        "countries": "FR",
    },
    headers: {
        "X-API-Key": "nce8u3Rq5yNq0jL9FjpmxZ8jWCzv9xvw",
    },
	})
	.done(displayOneMovie)
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("HTTP Request Failed");
});



$.getJSON("https://api.internationalshowtimes.com/v4/movies/12", displayOneMovie);
