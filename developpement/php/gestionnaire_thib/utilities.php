<?php
// 1ère chose
function saveTask(array $taskData) {
// pour ouvrir le fichier a c'est le pointeur ou on ouvre le fichier
	$file = fopen('tasks.csv', 'a');
// pour mettre de nouvelle info et vu que c'est un tableau
    fputcsv($file, $taskData);
// pour fermer le fichier
    fclose($file);
}

// 4e chose

function loadTasks()
{

	$file = fopen('tasks.csv', 'a+');

    $tasks = array(); // []

    while(true) {

    	$taskData = fgetcsv($file);

    	if($taskData == false)
		{
      // on met un break sinon il y aura une boucle infinie
        	break;

        }
    	array_push($tasks, $taskData);

    }
    fclose($file);
// pour avoir la valeur de task on va le mettre dans le index php
      return $tasks;
}
// 5e chose
function saveTasks(array $tasks)
{
 $file = fopen('tasks.csv', 'w');

   foreach($tasks as $taskData)
 {

   fputcsv($file, $taskData);
 }

   fclose($file);
}

 ?>
