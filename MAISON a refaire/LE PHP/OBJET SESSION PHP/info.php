<?php

session_start();

if( array_key_exists('user', $_SESSION)) {

	echo '<p>'.$_SESSION['user']['FirstName'].'</p>';
    echo '<p>'.$_SESSION['user']['LastName'].'</p>';
    echo '<p>'.$_SESSION['user']['Email'].'</p>';


} else {

	echo '<p>Vous n\'êtes pas connecté</p>';

}

?>

<a href="index.php">index</a>
