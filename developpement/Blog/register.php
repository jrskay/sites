<?php
session_start();
// pour crypter le mdp
include 'lib.php';
if(empty($_POST) == false) {
$hashPassword = hashPassword($_POST['Password']);

  include 'bdd_connection.php';

  $query = $pdo->prepare
(
    'INSERT INTO
            Users
            (FirstName, LastName, Email, Password)
        VALUES
            (?, ?, ?, ?)'
);

$query->execute([$_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $hashPassword]);

}
$template = 'register';
include 'layout.phtml';

 ?>
