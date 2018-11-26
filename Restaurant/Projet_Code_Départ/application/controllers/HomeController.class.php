<?php

class HomeController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
  	/* Méthode appelée en cas de requête HTTP GET
  	 * L'argument $http est un objet permettant de faire des redirections etc.
  	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.*/

     // declare que $mealModel est un nouveau model de la classe MealModel
     $mealModel = new MealModel();
     // on stock dans $meal le model de la classe MealModel en fonction de la fonction listAllMeal
     $meal = $mealModel->listAllMeal();
     // pour voir si on recupere ce que l'on a stocker c.a.d le model de la classe MealModel en fonction de la fonction listAllMeal
     // var_dump($meal);

     // on return 'meals' dans la variable $meal
     return [ 'meals' => $meal ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  	/* Méthode appelée en cas de requête HTTP POST
  	 * L'argument $http est un objet permettant de faire des redirections etc.
  	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.*/
  }
}
