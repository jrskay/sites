<?php
session_start();
if(array_key_exists('user', $_SESSION) == false) {
   header('Location: blog.php');
   exit();
include 'bdd_connection.php';

$query = $pdo->prepare
	(
		'SELECT
          Post.Id, Title, Content, CreationTimestamp, FirstName, LastName, Category.Name AS Category_Name
    FROM
      	  Post
    INNER JOIN
          Autor
	  ON
	        Post.Autor_Id = Autor.Id
	  INNER JOIN
	        Category
	  ON
	        Post.Category_Id = Category.Id
	  ORDER BY
	        CreationTimestamp DESC'
		);

$query->execute();


$posts = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($posts);

$template = 'admin';

include 'layout.phtml';

?>
