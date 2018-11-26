
// fonction pour afficher le texte qui est dans le test.php
function gestionData(response) {
  $('#target').html(response);
}

// fonction qui affiche les donneées dans le test_json.php
function getDataJSON(response) {
  // on fait un console.log de response pour voir si on récupere bien les données de test_json.php
  console.log(response);
  // pour pouvoir afficher c'est données de test_json.php en liste on déclare un ul comme ça
  var list = $('<ul>');
  // puis on fait une boucle au niveau de response
  for (var i = 0; i < response.length; i++) {
    // dans cette boucle on ajoute les données a chaque ligne pour faire la liste
    var li = $('<li>');
    // append permet d'ajouter un autre élements puis on concatène le firstName et le phone
    list.append(li.append(response[i].firstName+' '+response[i].phone));
  }
// pour afficher la liste (list = $('<ul>')) a l'endroite de target
  $('#target').html(list);

}



$('#run').on('click', choise);

function choise(e) {
  e.preventDefault();

  var choice = $('input[name=what]:checked').val()
  console.log(choice);
  switch (choice) {
    case '1':
      $.get('test.php', gestionData);
      break;
    case '2':
      $.getJSON('test_json.php', getDataJSON);
      break;
    case '3':
      $.get('movies.php', gestionData);
      break;
    default:
  }
}
