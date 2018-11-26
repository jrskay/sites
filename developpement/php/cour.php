il faut des name avec input dans le htlm
il faut une variable
<!-- obligatoire -->
$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');

$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare
(
	'SELECT contactFirstName, contactLastName FROM customers'
);

$query->execute();
<!-- $customers c'est une variable qui permet de stocker les  -->
<!-- fetchAll fait un tableau qui contient des tableaux associatif -->
$customers = $query->fetchAll(PDO::FETCH_ASSOC);

<!-- fin obligatoire -->



<!-- exo pour le foreach -->
<?php


// là on a un tableau associatif
$tab = [
			[
             'name' => 'Jean',
             'job' => 'studient',
        	 'note' => '2/20',
     		 'boisson' => 'bière',
       		],

            [
             'name' => 'Allan',
             'job' => 'studient',
        	 'note' => '3/20',
     		 'boisson' => 'whisky',
       		],

            [
             'name' => 'Max',
             'job' => 'on sait pas',
        	 'note' => '4.5/20',
     		 'boisson' => 'vin',
       		],

            [
             'name' => 'Younes',
             'job' => 'studient',
        	 'note' => '2/20',
     		 'boisson' => 'Vodka Cercueil',
       		],
            [
             'name' => 'Marc',
             'job' => 'pro',
        	 'note' => '6/20',
     		 'boisson' => 'Trou normand',
       		],

            [
             'name' => 'Julien',
             'job' => 'studient',
        	 'note' => '1.5/20',
     		 'boisson' => 'Gin Tonic',
       		],
            [
             'name' => 'Rémi',
             'job' => 'studient',
        	 'note' => '2.5/20',
     		 'boisson' => 'Clavados',
       		],


		];


        include 'index.phtml';
// pour récuperer la note de Alan
// note d'Alan $tab[1]['note']
// pour récuperer le nom de marc
// $tab[4]['name'] => Marc

?>
 <!-- on veut tous les nom dans un paragraphe -->
<html>
<?php foreach ($tab as $studient) { ?>

	<p><?= $studient['name'] ?> <?= $studient['note'] ?></p>

<?php } ?>

</html>
