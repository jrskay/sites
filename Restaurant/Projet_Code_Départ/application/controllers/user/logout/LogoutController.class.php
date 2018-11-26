<?php
// déconnection
session_destroy();

// redirection
// declare que $http est un nouveau model de la classe Http
$http = new Http();
// le model de la classe Http en fonction de la fonction redirectTo
$http->redirectTo('');
 ?>
