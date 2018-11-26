<?php
session_start();
include 'Database.class.php';
include 'User.class.php';


$logout = new User();
$logout->logoutSession();


/* methode procédurale
session_destroy();
header('Location: index.php');
exit();
*/

?>
