<?php

class MealModel
{
  public function listAllMeal()
  {
    // declare que $meal est un nouveau model de la classe Database
    $meal = new Database();
    // On fait une requete sql pour récuperer toutes les infos de la table Meal
    $sql= 'SELECT *
          FROM Meal';
    // on fait un return pour récupeper le resultat de la requete sql
        // on utilise query car il y a un fetchAll dans sa fonction et comme il faut toutes les infos on utilise donc la fonction query qui vient de la class Database
    return $meal->query($sql);
  }

  // on utilise la focntion native find() en foncton de la variable $mealId pour retrouver l'Id
  public function find($mealId)
  {
    $meal = new Database();
    // On fait une requete sql pour récuperer le meal en fonction de son Id !!! attention à l'injection SQL
    $sql = 'SELECT *
            FROM Meal
            WHERE Id = ?';
    // Récupération du produit alimentaire spécifié.
    // on fait un return pour récupeper le resultat de la requete sql
    // on utilise queryOne car il y a un fetch dans sa fonction et comme il faut une ligne d'infos on utilise donc la fonction queryOne qui vient de la class Database
    return $meal->queryOne($sql, [ $mealId ]);
  }
}


?>
