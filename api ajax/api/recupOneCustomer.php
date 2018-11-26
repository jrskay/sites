<?php

header('access-control-allow-origin: *');
header('Content-Type: application/json');


include 'classes/Database.class.php';

if (array_key_exists('id', $_GET) == false) {

	echo 'pas de paramètre';
    exit();

}

$database = new Database();

$sql = 'SELECT * FROM customers WHERE customerNumber =?';

$execute = [$_GET['id']];

$customer = $database->selectOneInSql($sql, $execute);

if ($customer != false)
{
  echo json_encode($customer);
  exit();

} else {

	echo 'Erreur 404 pas de customer avec cet Id';
}


?>
