<?php
session_start();
include 'lib.php';
// voir il y a un user
if(empty($_POST) == false ) {
	var_dump($_POST);

    include 'bdd_connection.php';
// requete users
  $query = $pdo->prepare
		(
		    'SELECT *
        FROM Users
        WHERE Email = ?'
		);

$query->execute([ $_POST['email'] ]);
$user = $query->fetch(PDO::FETCH_ASSOC);

// on fait les instructions si le mdp user est le meme que celui qui est poster et que le user est différent on envois faux
  if( verifyPassword($_POST['password'], $user['Password']) && $user != false ) {
// $_SESSION['user']['FirstName'] prend la valeur du post $user['FirstName']
  $_SESSION['user']['FirstName'] = $user['FirstName'];
// $_SESSION['user']['LastName'] prend la valeur du post $user['LastName']
  $_SESSION['user']['LastName'] = $user['LastName'];
// $_SESSION['user']['Email'] prend la valeur du post $user['Email']
  $_SESSION['user']['Email'] = $user['Email'];

// message Connection établie
  echo 'Connection établie';

  var_dump($_SESSION);
  // header('Location: admin.php');
  // exit();

  }
}
$template = 'login';
include 'layout.phtml';
 ?>
