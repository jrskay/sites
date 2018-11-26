
// fonction pour afficher le contenue qui est dans le test.php ou pour afficher
function gestionData(response) {
  // pour afficher a l'endroit de target
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

// déclaration de l'evenement lorsque l'onn clic sur le button qui a l'id run on fait la fonction choise
$('#run').on('click', choise);
// fonction choix
function choise(e) {
  // cette fonction permet d'annuler tout éventuelle evenement avant l'evenement que l'on provoque
  e.preventDefault();
// déclaration d'une variable pour stocker ce qui a été choisi
  var choice = $('input[name=what]:checked').val()
  // pour voir ce qui a été choisi
  console.log(choice);
  // switch en fonction de choise
  switch (choice) {
    // Dans le case on met 1 parce que dans le html c'est équivaux a value="1"  du formulaire  qui est de type="radio" et du name="what"
    case '1':
      // on prend le fichier test.php et on va utiliser la fonction gestionData donc on va prendre le contenue qui est dans test.php et l'afficher dans le index.html ou il y a la section avec l'id target
      $.get('test.php', gestionData);
      break;
    // Dans le case on met 2 parce que dans le html c'est équivaux a value="2"  du formulaire  qui est de type="radio" et du name="what"
    case '2':
      // on prend le fichier test_json.php et on va utiliser la fonction getDataJSON donc on va prendre le contenue qui est dans test_json.php et l'afficher dans le index.html ou il y a la section avec l'id target
      $.getJSON('test_json.php', getDataJSON);
      break;
    // Dans le case on met 3 parce que dans le html c'est équivaux a value="3"  du formulaire  qui est de type="radio" et du name="what"
    case '3':
      // on prend le fichier movies.php et on va utiliser la fonction gestionData donc on va prendre le contenue qui est dans movies.php et l'afficher dans le index.html ou il y a la section avec l'id target
      $.get('movies.php', gestionData);
      break;
    default:
  }
}
