<?php
session_start();
if(array_key_exists('user', $_SESSION) == false) {
   header('Location: blog.php');
   exit();
}

// connection	à la base de données
include 'bdd_connection.php';

// Requete Autor
$query = $pdo->prepare
		(
		    'SELECT *
        	FROM Autor'
		);

$query->execute();
// on stocke le résultat de la requete dans la variable authors
$authors = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($authors); // pour voir si on récupere tout


// Requete Catégory
$query = $pdo->prepare
		(
		    'SELECT  Id, Name
            FROM Category'
		);

$query->execute();
// on stocke le résultat de la requete dans la variable categories
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($categories); // pour voir si on récupere tout

// Condition pour savoir si le post est vide
if(empty($_POST) == false) {
	var_dump($_POST); // pour voir si c'est vide

// requete pour sauvegarder les éléments du post de l'utilisateur dans la base de données, on utilise le insert into pour pouvoir enregistrer dans le champs de la table Post, on va protéger nos valeur pour éviter une attaque par injection SQL attention faire attention au l'ordre ou on a écrit les éléments, Now() on ne met pas de ? car f'ait une fonction native qui permet de prendre la date à l'instant au la requete est faite // on met des ? pour se protéger de l'injection SQL apres on les mettera a la ligne 22. En SQL, la fonction NOW() permet de retourner la date et l’heure du système. Cette fonction est très pratique pour enregistrer la date et l’heure d’ajout ou de modification d’une donnée, dans un DATETIME ou un DATE(). Cela permet de savoir exactement le moment où a été ajouté une donnée contenu dans une table. dans notre cas CreationTimesTamp est en typer DATETIME
   $query = $pdo->prepare
		(
			// / on met les varialbles de maniere respective de la requete Post (Title, Content, Autor_Id, Category_Id, CreationTimesTamp) et [$title, $contents, $author, $category
		    'INSERT INTO Post (Title, Content, Autor_Id, Category_Id, CreationTimesTamp)
			  VALUES (?, ?, ?, ?, NOW())'
		);

	 // faire attention au l'ordre ou on a écrit les éléments
   $query->execute([$_POST['title'], $_POST['contents'], $_POST['author'], $_POST['category']]);
	// la fonction suivante c'est pour envoyer la requete sur le blog.php
	header('Location: blog.php');
    exit();
}
// include et template
$template ='add_post_thib';
include 'layout.phtml';
 ?>
