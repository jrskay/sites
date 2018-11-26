<?php

class Database {


	public function selectAllInSql($sql, $execute) {
		include 'bdd_connection.php';

		$query = $pdo->prepare($sql);

		$query->execute( $execute );

		return $query->fetchAll(PDO::FETCH_ASSOC);

	}


	public function selectOneInSql($sql, $execute) {
		include 'bdd_connection.php';

		$query = $pdo->prepare($sql);

		$query->execute( $execute );

		return $query->fetch(PDO::FETCH_ASSOC);

	}

	public function executeInSql($sql, $execute) {

		include 'bdd_connection.php';

		$query = $pdo->prepare($sql);

		$query->execute( $execute );

	}



}




?>
