<?php
// ce que j'ai fais
// include 'traducteur.phtml';
//


$result = null;
 $dictionary =
    [
       'cat'    => 'chat',
       'dog'    => 'chien',
       'monkey' => 'singe',
       'sea'    => 'mer',
       'sun'    => 'soleil'
   ];
//
// if (array_key_exists('cat', $dictionary)) {
//     $name = 'chat';
// }
// $name = $_POST['mot'];
// var_dump($name);


// si clé existe pour word (qui est le name de l'input du formulaire du html) et pour le $_POST (ce qui est la donnée récuperer des données envoyer d'une page a l'autre) sont vrai alors
if (array_key_exists('word', $_POST) == true) {
    // on affiche la donnée récuperer des données envoyer d'une page a l'autre
    var_dump($_POST);
    // le resultat prend la valeur de la fonction translate
    $result = translate($dictionary);

}

// déclaration de la fonction translate
function translate($dico){
  // déclaration de la variable $direction avec la donnée récuperer des données envoyer d'une page a l'autre du select direction qui est dans le html
  $direction = $_POST['direction'];
  // si $direction prend la valeur de direction tofrench qui est dans le html
  if ($direction == 'toFrench') {
    // si clé existe pour word (qui est le name de l'input du formulaire du html) et pour le $_POST (ce qui est la donnée récuperer des données envoyer d'une page a l'autre)
    if (array_key_exists('word', $_POST)) {
      // on déclare la variable r qui prend la valeur de l'index du tableau dico qui prend aussi la valeur de l'index du tableau $_POST qui est une chaine de caractère qui sera word
      // pour resumer la variable est égal à l'index du tableau à nous qui va dans l'index du tableau de l'utilisateur
      $r =  $dico[$_POST['word']];
      // on fait un return de la variable r
      return $r;
    }
    // si $direction prend la valeur de direction toEnglish qui est dans le html
  } else if ($direction == 'toEnglish') {
    // si clé existe pour word (qui est le name de l'input du formulaire du html) et pour le $_POST (ce qui est la donnée récuperer des données envoyer d'une page a l'autre)
    $r = array_search($_POST['word'], $dico);
      // la variable r prend la valeur du mot
      // $r =  $dico[$_POST['word']];
      // on fait un return de la variable r
      return $r;
    }
}


include 'traducteur.phtml';


?>
