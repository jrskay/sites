<!--
// login.php
// session_start();

// ça c'etait pour voir comment ca fonction avant que l'on ai fait la base de données maintenant que la base de données est faite on en a plus besoin
// $user = [
// 	'FirstName' => 'Jean',
//   'LastName' => 'Amazan',
// 	'Email' => 'jamaz@gmail.com',
//   'Password' => 'azerty'
// ];

// if(empty($_POST) == false ) {
//   var_dump($_POST);
//
//       if( $user['Email'] == $_POST['email'] && $user['Password'] == $_POST['password'] ) {
//             $_SESSION['user']['FirstName'] = 'Jrskay';
//             $_SESSION['user']['LastName'] = 'Le majestro';
//             $_SESSION['user']['Email'] = $user['Email'];
//             echo 'Connecté';
//             var_dump($_SESSION);
//
//       }
// } -->
<?php
session_start();

if(empty($_POST) == false ) {
	var_dump($_POST);

    include 'config.php';

    $query = $pdo->prepare
		(
		    'SELECT *
        FROM Users
        WHERE Email = ?'
		);

	$query->execute([ $_POST['email'] ]);

	$user = $query->fetch(PDO::FETCH_ASSOC);

    // var_dump($user);

    if( $user['Password'] == $_POST['password'] && $user != false ) {

    $_SESSION['user']['FirstName'] = $user['FirstName'];
    $_SESSION['user']['LastName'] = $user['LastName'];
    $_SESSION['user']['Email'] = $user['Email'];

    echo 'Connecté';

    var_dump($_SESSION);
    header('Location: index.php');
    exit();

}
}
 ?>

<a href="index.php">index</a>

<?php if (array_key_exists('user', $_SESSION)== false) {?>

<form id="login-form" action="login.php" method="POST">
	<label>Email</label>
	<input type="text" name="email" />

    <label>Password</label>
	<input type="password" name="password" />

	<input type="submit" value="envoyer" />
</form>

<?php } else {?>

<p>Vous êtes connecté</p>
<a href="logout.php">logout</a>

<?php } ?>
