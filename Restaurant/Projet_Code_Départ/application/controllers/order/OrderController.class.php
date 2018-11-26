<?php

class OrderController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    /* Méthode appelée en cas de requête HTTP GET
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.*/

    $ordermealModel = new OrderModel();
    // on stock dans la variable $ordermeal la nouvelle class OrderModel en fonction de la fonction getOrderMeal
    $ordermeal = $ordermealModel->getOrderMeal();
    // var_dump($ordermeal);
    // on return les meals dans la variable $ordermeal
    return [ 'meals' => $ordermeal ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    /* Méthode appelée en cas de requête HTTP POST
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.*/

  }
}

?>
