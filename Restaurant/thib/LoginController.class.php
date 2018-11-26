<?php


class LoginController
{
	public function httpGetMethod()
	{

	}

	public function httpPostMethod(Http $http, array $formFields)
	{
    	if (empty($_POST) == false) {

    		$userModel = new UserModel();
            $user      = $userModel->findWithEmailPassword
            (
                $_POST['email'],
                $_POST['password']
            );


            if(empty($user) == false) {
                $userModel->create
                (
                    $user['Id'],
                    $user['FirstName'],
                    $user['LastName'],
                    $user['Email'],
                    $user['Address'],
                    $user['ZipCode'],
                    $user['City']
                );

                $http->redirectTo('/');
            } else {
                echo 'votre email et/ou mot de passe sont incorrect';
            }

    	}
    }

}

?>
