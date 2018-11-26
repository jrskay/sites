<?php
// index.php

include 'application/bdd_connection.php';

$query = $pdo->prepare
(
    'SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            FirstName,
            LastName
        FROM
            Post
        INNER JOIN
            Author
        ON
            Post.Author_Id = Author.Id
        ORDER BY
            CreationTimestamp DESC'
);

$query->execute();


$posts = $query->fetchAll(PDO::FETCH_ASSOC);


$template = 'index';
include 'layout.phtml';

?>

<!-- index.phtml -->

<h2><i class="fa fa-home"></i> Accueil</h2>

<ul class="post-list">
	<?php foreach($posts as $post): ?>
        <li class="post">
            <h3>
                <i class="fa fa-hand-o-right"></i>&nbsp;
                <!-- Lien vers article de blog détaillé avec les commentaires -->
                <a href="show_post.php?id=<?= intval($post['Id']) ?>" title="Consulter l'article">
                    <?= htmlspecialchars($post['Title']) ?>
                </a>
            </h3>
            <!-- Seul un extrait de l'article du blog est affiché -->
            <article><?= substr(htmlspecialchars($post['Contents']), 0, 100) ?>&nbsp;[...]</article>
            <small>
                Rédigé par <?= htmlspecialchars($post['FirstName']) ?> <?= htmlspecialchars($post['LastName']) ?>
                le <?= htmlspecialchars($post['CreationTimestamp']) ?>
            </small>
        </li>
    <?php endforeach; ?>

</ul>



<?php
// show_post.php
// ctype_digit() fonction native comme isNaN
if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id'])){
        header('Location: index.php');
        exit();
}

include 'application/bdd_connection.php';

$query = $pdo->prepare
(
	'SELECT
        Post.Id,
        Title,
        Contents,
        CreationTimestamp,
        FirstName,
        LastName
	  FROM
	    Post
	  INNER JOIN
	    Author
	  ON
	    Post.Author_Id = Author.Id
	  WHERE
	    Post.Id = ?'
		);

$query->execute([$_GET['id']]);




$post = $query->fetch(PDO::FETCH_ASSOC);


$template = 'show_post';
include 'layout.phtml';

?>

<!-- show_post.phtml -->

<h2><i class="fa fa-file-text-o"></i> Article</h2>

<section class="post">
    <h3><?= htmlspecialchars($post['Title']) ?></h3>
    <article><?= nl2br(htmlspecialchars($post['Contents'])) ?></article>
    <small>
        Rédigé par <?= htmlspecialchars($post['FirstName']) ?> <?= htmlspecialchars($post['LastName']) ?>
        le <?= htmlspecialchars($post['CreationTimestamp']) ?>
    </small>
</section>

<hr>

<ul class="comment-list">

</ul>

<hr>

<form class="generic-form" action="add_comment.php" method="POST">

    <!-- Utilisation d'un champ caché pour spécifier à quel article rattacher le commentaire -->
    <input type="hidden" name="postId" value="<?= intval($_GET['id']) ?>">

    <fieldset>
        <legend><i class="fa fa-comment-o"></i> Nouveau commentaire</legend>
        <ul>
            <li>
                <label for="nickName">Pseudo :</label>
                <input type="text" id="nickName" name="nickName">
            </li>
            <li>
                <label class="textarea" for="contents">Commentaire :</label>
                <textarea id="contents" name="contents" rows="5"></textarea>
            </li>
            <li>
                <button class="button button-primary" type="submit">Ajouter</button>
                <a class="button button-cancel" href="index.php">Annuler</a>
            </li>
        </ul>
    </fieldset>
</form>

<?php

//add_comment.php

if (empty($_POST) == false) {

    include 'application/bdd_connection.php';

    $query = $pdo->prepare
        (
            'INSERT INTO
            Comment
            (NickName, Contents, Post_Id, CreationTimestamp)
        VALUES
            (?, ?, ?, NOW())'
        );

    $query->execute([$_POST['nickName'], $_POST['contents'], $_POST['postId']]);





}

header('Location: show_post.php?id='.$_POST['postId']);
exit();
?>
<?php

//admin.php

include 'application/bdd_connection.php';

$query = $pdo->prepare
	(
		'SELECT
	            Post.Id,
	            Title,
	            Contents,
	            CreationTimestamp,
	            FirstName,
	            LastName,
	            Category.Name AS Category_Name
        	FROM
            	Post
        	INNER JOIN
            	Author
	        ON
	            Post.Author_Id = Author.Id
	        INNER JOIN
	            Category
	        ON
	            Post.Category_Id = Category.Id
	        ORDER BY
	            CreationTimestamp DESC'
		);

$query->execute();


$posts = $query->fetchAll(PDO::FETCH_ASSOC);


$template = 'admin';

include 'layout.phtml';

?>
<?php
<h2><i class="fa fa-cogs"></i> Panneau d''administration</h2>

<nav>
    <a href="add_post.php">Rédiger un nouvel article</a>
</nav>

<table>
    <caption>Liste des articles</caption>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Article</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach($posts as $post): ?>
            <tr>

                <td><a href="show_post.php?id=<?= intval($post['Id']) ?>" target="_blank"><?= htmlspecialchars($post['Title']) ?></a></td>
                <td><?= substr(htmlspecialchars($post['Contents']), 0, 200) ?></td>
                <td><?= htmlspecialchars($post['FirstName']) ?> <?= htmlspecialchars($post['LastName']) ?></td>
                <td><?= htmlspecialchars($post['Category_Name']) ?></td>
                <td>
                    <a class="edit" href="edit_post.php?id=<?= intval($post['Id']) ?>"><i class="fa fa-pencil"></i></a>
                    <a class="remove" href="delete_post.php?id=<?= intval($post['Id']) ?>"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php
//delete_post.php
session_start();
if(array_key_exists('user', $_SESSION) == false) {
   header('Location: blog.php');
   exit();
if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
{
     header('Location: index.php');
     exit();
}

include 'application/bdd_connection.php';

$query = $pdo->prepare
(
	'DELETE FROM
       Post
     WHERE
       Id = ?'
);

$query->execute([$_GET['id']]);

header('Location: admin.php');
exit();
?>

<?php
//edit_post.php
if(array_key_exists('user', $_SESSION) == false) {
   header('Location: blog.php');
   exit();
if(empty($_POST)) {

	if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
    {
       header('Location: index.php');
       exit();
    }

    $query = $pdo->prepare(
        	'
            SELECT
                Id,
                Title,
                Contents
            FROM
                Post
            WHERE
                Id = ?
        	');
    $query->execute([$_GET['id']]);
    $post = $query->fetch(PDO::FETCH_ASSOC);



	$template = 'edit_post';
	include 'layout.phtml';

} else {
	$query = $pdo->prepare(
        	'
            UPDATE
                Post
            SET
                Title = ?,
                Contents = ?
            WHERE
                Id = ?
        '
        );

    $query->execute([$_POST['title'], $_POST['contents'], $_POST['postId']]);

	header('Location: admin.php');
    exit();

}





?>



<!--edit_post.phtml-->

<form class="generic-form" action="edit_post.php" method="post">

    <!-- Utilisation d'un champ caché pour spécifier à quel article rattacher le commentaire -->
    <!-- type hidden pour éviter d'afficher l'id  -->
    <input type="hidden" name="postId" value="<?= intval($post['Id']) ?>">

    <fieldset>
        <legend><i class="fa fa-sticky-note-o"></i> Article</legend>
        <ul>
            <li>
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" value="">
            </li>
            <li>
                <label class="textarea" for="contents">Article :</label>
                <textarea id="contents" name="contents" rows="15"></textarea>
            </li>
            <li>
                <button class="button button-primary" type="submit">Mettre à jour</button>
                <a class="button button-cancel" href="index.php">Annuler</a>
            </li>
        </ul>
    </fieldset>
</form>

<!-- ******************************************* -->
<!-- parti avec la session  -->
<!-- ********************************************* -->
<?php
// register.php
include 'application/lib.php';

if(empty($_POST) == false) {

$hashPassword = hashPassword($_POST['Password']);

if(empty($_POST) == false) {

include 'application/bdd_connection.php';

    $query = $pdo->prepare
		(
		    ' INSERT INTO
                users
                (FirstName, LastName, Email, Password)
            VALUES
                (?, ?, ?, ?)'
		);

	$query->execute([$_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $hashPassword]);

	header('Location: login.php');
    exit();

}

$template = 'register';
include 'layout.phtml';
?>

<!-- register.phtml-->

<h2>Merci de renseigner vos informations</h2>

<form id="register-form"  class="generic-form" action="register.php" method="POST">
	<ul>
		<li>
			<label>Nom</label>
		    <input type="text" name="LastName"/>
		</li>
		<li>
		    <label>Prénom</label>
		    <input type="text" name="FirstName"/>
		</li>
		<li>
		    <label>Email</label>
		    <input type="text" name="Email"/>
		</li>
		<li>
		    <label>Password</label>
		    <input type="text" name="Password"/>
		</li>
		<li>
			<input type="submit" value="envoyer"/>
		</li>

	</ul>
</form>

<?php

// login.php
session_start();

if(empty($_POST) == false ) {

	include 'application/bdd_connection.php';
	$query = $pdo->prepare
		(
		    'SELECT
	            *
             FROM
              	users
             WHERE Email = ?'
		);

	$query->execute([ $_POST['email'] ]);


	$user = $query->fetch(PDO::FETCH_ASSOC);

    if ($_POST['password'] ==  $user['Password'] && $user != false) {

    	$_SESSION['user']['FirstName'] = $user['FirstName'];
		$_SESSION['user']['LastName'] = $user['LastName'];
        $_SESSION['user']['Email'] = $user['Email'];

        header('Location: index.php');
        exit();

    }

}


$template = 'login';
include 'layout.phtml';

?>

<!-- login.phtml -->

<h2>Tapez vos identifiants de connexion</h2>

<form id="login-form" class="generic-form" action="login.php" method="POST">
	<ul>
		<li>
			<label>Email : </label>
			<input type="text" name="email" />
	    </li>
	    <li>
	    	<label>Password : </label>
			<input type="password" name="password" />
	    </li>
	    <li>
			<input type="submit" value="envoyer" />
	    </li>
	</ul>
</form>

<?php


session_start();

session_destroy();



header('Location: index.php');
exit();

?>


<!-- layout.phtml -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Encore un Blog ?! #nonMaisAllo</title>

    <!-- Feuilles de style externes -->
    <link rel="stylesheet" href="css/normalize-3.0.3.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">

    <!-- Feuilles de style de l'application -->
    <link rel="stylesheet" href="css/blog-main.css">
    <link rel="stylesheet" href="css/blog-theme.css">
    <link rel="stylesheet" href="css/ui-button.css">
    <link rel="stylesheet" href="css/ui-form.css">
</head>
<body>
    <!-- En-tête commune de l'application -->
    <header class="blog-header">
        <h1><a href="index.php"><i class="fa fa-microphone"></i> Encore un Blog ?! #nonMaisAllo</a></h1>
        <nav>
        <?php if( array_key_exists('user', $_SESSION)== true ):  ?>

            <a href="admin.php"><i class="fa fa-cogs"></i> Administration</a>
            <a href="logout.php">Déconnexion</a>

        <?php else: ?>
            <a href="login.php"><i class="fa fa-cogs"></i>Connexion</a>
            <a href="register.php">S'enregistrer</a>
        <?php endif; ?>
        </nav>
    </header>

    <main>
        <!-- Chargement du template PHTML spécifié par le programme PHP -->
        <?php include $template.'.phtml' ?>
    </main>

    <!-- Pied de page commun de l'application -->
    <footer class="blog-footer">
        <small>Le blog des élèves de la 3W Academy</small>
    </footer>
</body>
</html>
