<?php
session_start();

include 'bdd_connection.php';

// if(array_key_exists('id', $_GET) == false || !ctype_digit($_GET['id'])){
//         header('Location: blog.php');
//         exit();
// }
$id = $_GET['id'];
// var_dump($id);
$query = $pdo->prepare
(
	'SELECT
        Post.Id, Title, Content, CreationTimestamp, FirstName,
        LastName
	  FROM
	    Post
	  INNER JOIN
	    Autor
	  ON
	    Post.Autor_Id = Autor.Id
	  WHERE
	    Post.Id =?'
		);

$query->execute([$id]);

$posts = $query->fetch(PDO::FETCH_ASSOC);
// var_dump($posts);




if (empty($_POST) == false) {
var_dump($_POST);
    $query = $pdo->prepare
        (
            'INSERT INTO
            Comment
            (NickName, Content, CreationTimesTamp, Post_Id)
        VALUES
            (?, ?, NOW(), ?)'
        );

    $query->execute([$_POST['nickName'], $_POST['contents'], $id]);

}

$query = $pdo->prepare
		(
		    'SELECT
            NickName,
            Content,
            CreationTimestamp
	        FROM
	            Comment
	        WHERE
	            Post_Id = ?'
		);

$query->execute([$_GET['id']]);
$comments = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($comments);


$template = 'show_post';
include 'layout.phtml';

 ?>
