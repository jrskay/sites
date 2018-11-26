<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <?php foreach  ($customers as $index => $customer) {  ?>

        	<p><strong><?= $index ?></strong> <?= $customer['contactFirstName'] ?> <?= $customer['contactLastName'] ?></p>

    	<?php } ?>
    </ul>


  </body>
</html>








$query = $pdo->prepare
(
	'SELECT orderdetails.orderNumber FROM orderdetails
	INNER JOIN orders ON orders.orderNumber = orderdetails.orderNumber'
);

$query->execute();

$commande = $query->fetchAll(PDO::FETCH_ASSOC);

function start() {

}



<?php foreach ($commande as $key => $value) { ?>


<?php }; ?>















<?php

$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');

$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare
(
	'SELECT contactFirstName, contactLastName FROM customers'
);

$query->execute();

$customers = $query->fetchAll(PDO::FETCH_ASSOC);



echo $customers[0]['contactFirstName'].' '.$customers[0]['contactLastName'];

$query = $pdo->prepare
(
	'SELECT firstName, lastName FROM employees WHERE employeeNumber = 1002'
);

$query->execute();

$employee = $query->fetch(PDO::FETCH_ASSOC);

var_dump($employee);




// include 'index.phtml';
 ?>
