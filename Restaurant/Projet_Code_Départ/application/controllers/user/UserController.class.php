<?php

class UserController
{

  public function httpGetMethod(Http $http, array $queryFields)
  {
    /* Méthode appelée en cas de requête HTTP GET
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.*/
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    /* Méthode appelée en cas de requête HTTP POST
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.*/

    // si le $_POST n'est pas vide on fait les instructions suivantes
    if(empty($_POST) == false )
    {
      // var_dump($_POST);
    }
    // declare que $userModel est un nouveau model de la classe UserModel
    $userModel = new UserModel();
    // on stock dans la variable $users la classe UserModel en fonction de la fonction addUserList et ses arguments que l'on a choisi
    $users = $userModel->addUserList($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['birthYear'].'-'.$_POST['birthMonth'].'-'.$_POST['birthDay'],
    $_POST['address'], $_POST['city'], $_POST['zipCode'], $_POST['phone']);
  }
}

?>
