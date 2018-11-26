<?php

  $title = $_POST['title'],
  $task = $_POST['task'],
  $date_end = $_POST['date_end'],
  $priority = $_POST['priority'],


if(empty($_POST['title']) == true) {
  header('Location:gestionnaire.php');
} else {
  $task = fgets($file);
}


 var_dump($_POST);

 ?>
