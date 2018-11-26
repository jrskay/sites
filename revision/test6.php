<!---- index.php--->
<?php

//monsite.fr/index.php?id=3&animal=canard

$name = 'Saliou';
include 'index.phtml';

if(empty($_POST) == false) {

	echo $_POST['nom'];

}
// exemple par rapport au ulr de la ligne 4
if(array_key_exists('animal', $_GET) {
	echo $_Get['animal'];
}

?>



<!---- index.phtml--->

<!DOCTYPE html>
<html>
<head>
	<title>fight</title>
	<meta charset="utf-8">
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

</head>
<body>
	<p>Coucou <?= $name ?></p>

    <form method="POST" action="recup.php">
    	<input type="text" name="nom"/>
        <input type="submit" value="envoyer"/>

    </form>

</body>
</html>

<!---- recup.php--->
<?php

var_dump($_POST);

$_POST['nom'];


?>
