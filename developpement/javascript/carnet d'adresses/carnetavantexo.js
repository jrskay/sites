//jQuery
// Pour selectionner et faire un event listener
// Ca C'EST LA MEM CHOSE QUE LA LIGNE 11 A 2
$('#para1').on ('click', hello);
// Ca C'EST LA MEM CHOSE QUE LA LIGNE 16 A 20
$('.para').on('click', sayAlert);


$(document).on('keyup', function() {
	// pour faire du css a un evenement
    $('#para3').css('color', 'red');
    $('#para4').css('border', '1px solid red');
    $('#para2').toggleClass('hide');
    // autre exemple
    //$('#para2').toggleClass('hide');
    //$('#para2').toggleClass('hide');

});
$('#but').on('click', alertButton);

// transformer en string
JSON.stringify(tab);
// transformer en array / objet
JSON.parse(tab);

// pour sauvegarder
window.localStorage.setItem(key, tabstring);
// a faire les deux instructions suivante
// pour renvoyer les infos
var x = window.localStorage.getItem(key);
// il faut le mettre en array ou objet car il sera en string
tab = JSON.parse(x);

// pour tout supprimer
window.localStorage.clear();

// pour supprimer un élément en particulier
window.localStorage.remove(key);


function alertButton(event) {
  // MEME UTILITER QUE LE IMPORTANT QUAND ON FAIT UNE CLASSE EN JS,  SAUF QUE LA CEST POUR LES FONCTIONS
  event.preventDefault();
	alert($('#inp1').val());

}
// // natif
//
// // EN JQUERY IL Y A SON EQUIVALANT COMME LA LIGNE 4
// var para1 = document.getElementById('para1');
// para1.addEventListener('click', hello);
//
//
// // ce que l'on fait la c'est la meme chose que la ligne 5
// var para = document.querySelector('.para');
//
// for (var i = 0; i < para.length; i++) {
//
// 	para[i].addEventListener('click', alert);
//
// }

//LA MEME CHOSE QUE LA LIGNE
// var inp1 = document.getElementById('inp1');
// POUR RECUPERER UNE VALEUR
// inp1.value
//



// <!-- exemple pour afficher du paragraphe -->
var affiche = document.getElementById('affichage');

affiche.textContent = 'hello'; // natif
$('#affichage').text('hello'); // jQuery


affiche.innerHTML = '<p>hello</p>'; //natif
$('#affichage').html('<p>hello</p>'); // jQuery

affiche.append("<p>hello</p>") // natif
$('#affichage').append('<p>hello</p>'); // jQuery




function hello() {

	console.log('hello');
}
function sayAlert() {

	alert($(this).text()); // le.text equivalent TextContent

}
