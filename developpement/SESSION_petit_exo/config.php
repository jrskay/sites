<?php
//config.php
$pdo = new PDO('mysql:host=localhost;dbname=session', 'root', 'troiswa');

// Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
$pdo->exec('SET NAMES UTF8');

?>
