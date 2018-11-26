<?php
// on déclare cette variable que l'on va protégé dans le execute pour eviter de se faire hacker par la méthode de l'injection sql
$num = $_GET['orderNumber'];

$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');

$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare
// ici on met listing des select que l'on va utiliser
// (priceEach * quantityOrdered) AS totalPrice on gros on multiplie et on met dans la variable totalPrice
// tout ça vient de orderdetails auquelle on join products qui a dedans productCode de products et le productCode
// on ne met pas de variable directement dans le code pour etre protéger de l'injection sql donc dans le where orderNumber on mais =?
(
	'SELECT productName,priceEach, quantityOrdered, (priceEach * quantityOrdered) AS totalPrice FROM orderdetails INNER JOIN products ON products.productCode = orderdetails.productCode
 	WHERE orderNumber ='.$num
);

$query->execute();

$commande = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($commande);

$query = $pdo->prepare
(
	'SELECT customerName, contactFirstName, contactLastName, addressLine1, city FROM customers INNER JOIN orders ON customers.customerNumber = orders.customerNumber WHERE orderNumber =?'

);

$query->execute( [$num] );

$client = $query->fetch(PDO::FETCH_ASSOC);

var_dump($client);





include 'detail.phtml';
 ?>
