<?php

if(empty($_POST) == false) {

	var_dump($_POST);
  include 'config.php';

  $query = $pdo->prepare
(
    'INSERT INTO
            Users
            (FirstName, LastName, Email, Password)
        VALUES
            (?, ?, ?, ?)'
);

$query->execute([$_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $_POST['Password']]);

}
 ?>
<form id="register-form" action="register.php" method="POST">
    <label>Nom</label>
    <input type="text" name="LastName"/>
    <label>Prénom</label>
    <input type="text" name="FirstName"/>
    <label>Email</label>
    <input type="text" name="Email"/>
    <label>Password</label>
    <input type="text" name="Password"/>

	  <input type="submit" value="envoyer"/>
</form>
