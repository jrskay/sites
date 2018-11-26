'use strict';
var contacts = [];

$('#add-contact').on('click', addItem);
//$('nett').on('click', removeItem);
$('#save-contact').on('click', save);

var form = document.getElementById('contact-form');
var details = document.getElementById('contact-details');
// var sauvegarde = document.getElementById('save-contact');

// fonction pour afficher le petit formulaire
function addItem() {

  form.classList.toggle('hide');
}

// fonction pour sauvegarder
function save(){
  // on déclare un objet pour pouvoir le stocker dans le localStorage
  var contact = {
    //  équivalent à document.getElementById('title').value;
    civility: $('#title').val(),
    //  équivalent à document.getElementById('lastName').value;
    lastName: $('#lastName').val(),
    firstName: $('#firstName').val(),
    phone: $('#phone').val()
  };
// on fait un push contact pour pouvoir Enregistrer d'autre contact
  contacts.push(contact);
  // juste pour voir si on récupere les infos du contact
  console.log(contacts);
// c'est la que l'on sauvegarde dans le localStorage grace a la fonction saveToLocalStorage
  saveToLocalStorage(contacts);

}
// on ajoute un paramètre (tab) dans la fonction
function saveToLocalStorage(tab) {
  // on crée une variable que l'on va enregister dans le paramètre de la fonction
  // dans cette variable on prendre la fonction qui permet de transformer en valeur string
  var tabString = JSON.stringify(tab);
  window.localStorage.setItem('contacts', tabString);
}


function removeItem() {

}
