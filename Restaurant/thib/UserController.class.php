<?php
////////////// - controllers/user/UserController.class.pĥp - ///////////////*******************------------------>

class UserController
{
	public function httpGetMethod()
	{

	}

	public function httpPostMethod(Http $http, array $formFields)
	{

    	if (empty($_POST) == false) {

            // fonction try catch une sorte de test
            try
			{

                $userModel = new UserModel();
                $userModel->signUp
                (
                    $_POST['lastName'],
                    $_POST['firstName'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['birthYear'].'-'.
                    $_POST['birthMonth'].'-'.
                    $_POST['birthDay'],
                    $_POST['address'],
                    $_POST['city'],
                    $_POST['zipCode'],
                    $_POST['phone']
                );

                $http->redirectTo('/user/login');
        	}
          
            catch(DomainException $exception) {
            	echo 'la requête pdo a merdé';

            }

        }

    }



}
