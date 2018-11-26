<?php
// le mettre avant 
include 'utilities.php';

// 6e chose
$tasks = loadTasks();
// date_create c'est comme new_dete dans le js
$now = date_create();

include 'index.phtml';

 ?>
