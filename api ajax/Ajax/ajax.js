$.getJSON('http://localhost/api/recupOneCustomer.php?id=103', displayUser);

$.getJSON('http://localhost/api/office.php', displayUser);

$.getJSON('http://localhost/api/office.php?id=3', displayUser);


$.getJSON('http://localhost/api/employees.php', displayUser);

$.getJSON('http://localhost/api/employees.php?id=1002', displayUser);
/*
$.ajax({
       url : 'http://localhost/api/recupOneCustomer.php?id=103', // Le nom du script a changé, c'est send_mail.php maintenant !
       type : 'GET', // Le type de la requête HTTP, ici devenu POST
       dataType : 'json',
       success : function(response, statut){ // code_html contient le HTML renvoyé
           console.log(response);
       }
});

*/


function findCustomer(event) {
	event.preventDefault();
	var keyWord = $('#customerName').val();
	$.getJSON('http://localhost/api/recupCustomerWithKeyWord.php?api_key=xyz&keyword='+keyWord, displayUser);
}

function selectCountry(event) {
	event.preventDefault();
  	var country = $('#country').val();
  	$.getJSON('http://localhost/api/office.php?country='+country, displayUser);

}

function thib(e){
  e.preventDefault();
  var t = $('#thib').val();
    	$.getJSON('http://devman.fr/api/employees.php?id='+ t, displayUser);
}

function displayUser(response) {
	console.log(response);
}

$('#submitCN').on('click', findCustomer);
$('#subthib').on('click', thib);
$('#country').on('change', selectCountry);

console.log('coucou');
