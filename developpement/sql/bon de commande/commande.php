<?php
// a faire tout le temps de la ligne 3 à 10
$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');
$pdo->exec('SET NAMES UTF8');
$query = $pdo->prepare
(
	'SELECT orderNumber, orderDate, shippedDate, status  FROM orders'
);
$query->execute();
$orders = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($orders);



include 'index.phtml';

 ?>
