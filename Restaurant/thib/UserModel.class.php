<?php 
class UserModel {

	public function signUp(	$lastName,
                            $firstName,
                            $email,
                            $password,
                            $birthDate,
                            $address,
                            $city,
                            $zipCode,
                            $phone)
    {

    	$hashPassword = $this->hashPassword($password);

    	$database = new Database();


        $user = $database->queryOne
        (
            "SELECT Id FROM User WHERE Email = ?", [ $email ]
        );


        if(empty($user) == false)
        {
           $http = new Http();
           $http->redirectTo('/user');
        }

        $sql = "INSERT INTO User
		(
			LastName,
			FirstName,
			Email,
			Password,
			BirthDate,
			CreationTimestamp,
			Address,
			City,
			ZipCode,
			Phone
		) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)";

         $database->executeSql($sql,
        [
            $lastName,
            $firstName,
            $email,
            $hashPassword,
            $birthDate,
            $address,
            $city,
            $zipCode,
            $phone
        ]);




    }

    private function hashPassword($password)
    {

        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        return crypt($password, $salt);
    }


    private function verifyPassword($password, $hashedPassword)
	{
        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
		return crypt($password, $hashedPassword) == $hashedPassword;
	}

    public function findWithEmailPassword($email, $password)
    {

    	$database = new Database();

        $user = $database->queryOne
        (
            "SELECT
                *
            FROM User
            WHERE Email = ?",
            [ $email ]
        );


        if($this->verifyPassword($password, $user['Password']) == true && $user != false)
    	{
        	return $user;

        } else {
    		echo 'Pas le bon Mot de passe';
    	}

    }

    public function create($userId, $firstName, $lastName, $email, $address, $zip, $city)
    {
    	$_SESSION['user'] =
        [
            'UserId'    => $userId,
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Email'     => $email,
            'Address'   => $address,
            'ZipCode'   => $zip,
            'City'      => $city
        ];

    }


}

?>
