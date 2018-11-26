<?php
$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');

$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare
(
    'SELECT
        orderNumber,
        orderDate,
        shippedDate,
        status
     FROM orders
     ORDER BY orderDate'
);
$query->execute();

$orders = $query->fetchAll(PDO::FETCH_ASSOC);
// on regarde si ça bon et apres le mettre en commentaire
// var_dump($orders);

include 'index.phtml';
 ?>
