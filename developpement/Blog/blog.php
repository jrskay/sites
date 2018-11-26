<?php
session_start();
var_dump($_SESSION);
// index.php
include 'bdd_connection.php';
// requete pour afficher le commentaire
$query = $pdo->prepare
		(
      // on écrite post_id parce qu'il y un id dans autor c'est pour éviter que la machine pète
		    'SELECT  Post.Id, Title, Content, CreationTimesTamp, Autor_Id, FirstName, LastName
        FROM	Post
        INNER JOIN Autor ON Post.Autor_Id = Autor.Id
        ORDER BY CreationTimestamp DESC'
		);

$query->execute();
// on stocke le résultat de la requete dans la variable posts
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($posts); // pour voir si les posts existe


$template = 'blog';
include 'layout.phtml';

?>
