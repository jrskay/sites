<?php

class BasketController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    /* Méthode appelée en cas de requête HTTP GET
		 * L'argument $http est un objet permettant de faire des redirections etc.
		 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.*/

      // var_dump($_SESSION);
  }


  public function httpPostMethod(Http $http, array $formFields)
  {
    /* Méthode appelée en cas de requête HTTP POST
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.*/


    // si le $_POST n'est pas vide on fait les étapes suivantes
    if (empty($_POST) == false)
    {
      var_dump($_POST);
      $totalOrder = json_decode($_POST['totalOrder']);

      // methode pour sécuriser le calcul pour éviter que quelqu'un le modifie dans le localstorage
      for ($i = 0; $i < count($totalOrder); $i++)
      {
        $mealModel =new MealModel();
        $secure = $mealModel->find($totalOrder[$i]->mealId);

        $totalOrder[$i]->securePrice =$secure['SalePrice'];
      }
      var_dump($totalOrder);

      $orderModel = new OrderModel();
      $orderId = $orderModel->validate( $_SESSION['user']['Id'], $totalOrder );

      $http->redirectTo('/order/validate?orderId='.$orderId);
    }
  }
}
?>
