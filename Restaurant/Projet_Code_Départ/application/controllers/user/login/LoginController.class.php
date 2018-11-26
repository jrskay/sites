<?php

class LoginController
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

    // declare que $connection est un nouveau model de la classe UserModel
    $connection = new UserModel();
    // on stock dans $co la classe UserModel en fonction de la fonction setUser et son arguement email
    $co = $connection->setUser($_POST['email']);
    // on envois $connection qui est le model de la classe UserModel en fonction de la fonction checkPassword et son argument que l'on a choisi
    $connection->checkPassword($_POST['password'], $co);
    // var_dump($_SESSION);
  }
}

?>
