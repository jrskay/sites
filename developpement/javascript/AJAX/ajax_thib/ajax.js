
function ajaxGetHtmlArticle(response)
{
	$('#target').empty(); // pour un peu de sécurite pour vider
	$('#target').html(response);

}
function ajaxGetJsoData(response) {
	$('#target').empty(); // pour un peu de sécurite pour vider
    var list = $('<ul>');

    for (var index = 0; index < response.length; index++) {
    	var li = $('<li>');

        list.append(li.append( response[index].firstName+' '+ response[index].pĥone ));

    }

    $('#target').html(list);
}
