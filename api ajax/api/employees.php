<?php

header('access-control-allow-origin: *');
header('Content-Type: application/json');

include 'classes/Database.class.php';
$database = new Database();

if (array_key_exists('id', $_GET) == false) {

	$sql = 'SELECT * FROM employees';


	$execute = [];

	$employees = $database->selectAllInSql($sql, $execute);


	echo json_encode($employees);
	exit();

}  else if(array_key_exists('id', $_GET) == true) {

	$sql = 'SELECT * FROM employees WHERE employeeNumber=?';

	$execute = [$_GET['id']];

	$office = $database->selectOneInSql($sql, $execute);

	echo json_encode($office);
	exit();
}

 ?>
