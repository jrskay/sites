<?php
  // 2è chose
  // sécurite par rapport au $_POST
  if(empty($_POST['title']) == false && $_POST['description'] == false) {
  // Déclaration des différentes variables que l'on va utilisé apres, les points c'est la concaténation dans le langage php
	$description = $_POST['description'];
  $date        =
  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
  $priority    = $_POST['priority'];
  $title       = $_POST['title'];
}

// 3è chose
// on fait une fonction addTask car on a besoin d'un tableau et non pas des strings
function addTask($title, $description, $date , $priority) {
// on fait une condition que sur description parce que c'est ce qui nous intéresse
	if(empty($description) == true)
    {
        $description = 'Tâche sans description';
    }

	$taskData =
	[
		$title,
		$description,
		$date,
		$priority
	];
// on appel la fonction qui est dans utilitise
    saveTask($taskData);
}

// 7e chose
function removeTasks(array $allTasks, array $indexes)
{
 $tasks = array();

   foreach($allTasks as $index => $taskData)
   {
     if(in_array($index, $indexes) == false)
       {

         array_push($tasks, $taskData);
       }


   }

 return $tasks;
}


 ?>
// bien comprendre le $_post le arrayp ou chek-box
