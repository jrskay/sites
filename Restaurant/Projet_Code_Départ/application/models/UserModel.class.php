<?php

class UserModel {
  // on met en argument des variables que l'on a besoin c.a.d $firstname, $lastname, $email, $password, $birthdate, $address, $city, $zipcode, $phone
  public function addUserList($firstname, $lastname, $email, $password, $birthdate, $address, $city, $zipcode, $phone)
  {
    // on stock dans la variable $hash ce UserModel en fonction de la fonction hashPassword et sa variable en argument $password
		$hash = $this->hashPassword($password);
    // declare que $addUser est un nouveau model de la classe Database
    $addUser = new Database();
    // On fait une requete sql pour envoyer des infos dans la table User !!! attention à l'injection SQL
    $sql = 'INSERT INTO User (FirstName, LastName, Email, Password, BirthDate, 	Address, City, ZipCode, Phone, CreationTimestamp)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())';
    // on stock dans un tableau qui est la variable $values les valeurs que l'on a besoin c.a.d $firstname, $lastname, $email, $hash, $birthdate, $address, $city, $zipcode, $phone
		$values = [$firstname, $lastname, $email, $hash, $birthdate, $address, $city, $zipcode, $phone];
    // on utilise la fonction executeSql qui vient de la class Database ou la fonction executeSql a pour argument ($sql, array $values = array()) c'est pour ça que à la ligne 15 on a mit les valeur dans un tableau
		$addUser ->  executeSql($sql, $values);
	}

	public function hashPassword($password)
	{
		$salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
		// Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
		return crypt($password, $salt);
	}

	public function verifyPassword($password, $hashedPassword)
	{
	  // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
		return crypt($password, $hashedPassword) == $hashedPassword;
	}

  public function setUser($email)
  {
    $setUser = new Database();

    $sql ='SELECT *
          FROM User
          WHERE Email=?';
    $val = [$_POST['email']];

    $co = $setUser->queryOne($sql,$val);
    return $co;
  }

    public function checkPassword($pass,$co){
      $http = new Http();
    if($this->verifyPassword($pass ,$co['Password'])&& $co !== null)
    {
      $_SESSION['user']['Id']= $co['Id'];
      $_SESSION['user']['FirstName'] = $co['FirstName'];
      $_SESSION['user']['LastName'] = $co['LastName'];
      $_SESSION['user']['Email'] = $co['Email'];
      $_SESSION['user']['Address'] = $co['Address'];
      $_SESSION['user']['City'] = $co['City'];
      $_SESSION['user']['ZipCode'] = $co['ZipCode'];
    }



  }




}


?>
