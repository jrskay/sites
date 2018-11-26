<?php



$task =
       [ $_POST['title'], $_POST['task'], $_POST['date_end'], $_POST['priority'],
       ]; 
$file = fopen('task.csv', 'r');


fputcsv($_POST, $task);

fclose($file);

 ?>
