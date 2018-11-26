<?php

$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');


$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare
(
	'SELECT
        customerName,
        contactFirstName,
        contactLastName,
        addressLine1,
        addressLine2,
        city
     FROM customers
     INNER JOIN orders ON orders.customerNumber = customers.customerNumber
		 -- protection
     WHERE orderNumber = ?'

);

$query->execute([$_GET['orderNumber']]);

$customer = $query->fetch(PDO::FETCH_ASSOC);

$query = $pdo->prepare
(
	'SELECT
        productName,
        priceEach,
        quantityOrdered,
        priceEach * quantityOrdered AS totalPrice
     FROM orderdetails
     INNER JOIN products ON products.productCode = orderdetails.productCode
     WHERE orderNumber = ?
     ORDER BY orderLineNumber'

);
$query->execute(array($_GET['orderNumber']));
$orderLines = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare
(
	'SELECT SUM(priceEach * quantityOrdered) AS totalAmount
     FROM orderdetails
     WHERE orderNumber = ?'
);

$query->execute(array($_GET['orderNumber']));

$result = $query->fetch(PDO::FETCH_ASSOC);
include 'order-form.phtml';
$totalAmount = $result['totalAmount'];

?>
