<?php

$var = 'Paul';

$tab = [
	'name' => 'Gérard',
    'age' => '34',
    'enfants'=> 8
];


// pour chercher une clé pour savoir si age existe dans le tableau $tab
array_key_exists('age', $tab); // renvoie true ou false
// pour chercher un valeur
in_array('34', $tab) // renvoie true ou false
// pour chercher une valeur
array_search(8, $tab)


// pour mettre une page de code dans le phtml pour éviter de tout retaper
include 'traducteur.phtml';

// dans le html on peut mettre du php exemple
<p> <?= $var ?> <:p>

 // a commenter
foreach ($variable as $key => $value) {
  // code...
}


// pour faire afficher sur le ... comme pour le document.write de js
echo "word";

// permet de récuperer les données envoyer d'une page a l'autre
$_POST['word']
// equivalent du console.log de js
var_dump($_POST);

$_GET['id'];
$_GET['name'];
?>
// ce qui est écrit dans le phtml
// <form class="" action="index.php" method="post">
//   <input type="text" name="mot" value="">
//   <select name="choice" >
//     <option value="toEnglish">français vers anglais</option>
//     <option value="toFrench">anglais vers français</option>
//   </select>
//   <input type="submit" value="Go"/>
// </form>
