<?php

$result = null;
$dictionary =
    [
        'cat'    => 'chat',
        'dog'    => 'chien',
        'monkey' => 'singe',
        'sea'    => 'mer',
        'sun'    => 'soleil'
    ];

if (array_key_exists('word', $_POST) == true) {
    var_dump($_POST);
    $word = strtolower($_POST['word']);
	  $direction = $_POST['direction'];
    $result = translate($word, $direction, $dictionary);
}

function translate($word, $direction, $dico) {
	if ($direction == "toFrench") {
    	if(array_key_exists($word, $dico)) {
            return $dico[$word];
        } else {
            return 'je ne connais pas ce mot';
        }
  } else {

    	if(in_array($word, $dico)) {
        	return array_search($word, $dico);
        } else {
            return 'je ne connais pas ce mot';
        }
    }
}

include '05-exercice-traducteur.phtml';
?>
