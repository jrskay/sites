<?php
// 6e chose
include 'utilities.php';





if(array_key_exists('indexes', $_POST) == true)
{
	var_dump($_POST);


    $allTasks = loadTasks();

    $tasks = removeTasks($allTasks, $_POST['indexes']);

    saveTasks($tasks);


}

?>
