<?php

class OrderModel
{
  public function getOrderMeal($value='')
  {
      $ordermeal = new Database();
      // On fait une requete sql pour récuperer tous les meals
      $sql= 'SELECT *
            FROM Meal';
      // on fait un return pour récupeper le resultat de la requete
      // query vient de la fonction query du fichier Database
      return $ordermeal->query($sql);
  }

  public function find($orderId)
	{
        $database = new Database();

        $sql = 'SELECT
                    *
                FROM `Order`
                WHERE Id = ?';

		// Récupération de la commande spécifiée.
		return $database->queryOne($sql, [ $orderId ]);
	}


	public function validate($userId, array $basketItems)
    {
        $database = new Database();

		$sql = 'INSERT INTO `Order`
			(
				User_Id,
				CreationTimestamp,
				TaxRate,
				Status
			) VALUES (?, NOW(), 20.0, "not payed")';
    	// attention a la ligne précédente on met not payed entre "" pour éviter qu'il l'interprete comme une key
    	$orderId =  $database->executeSql( $sql , [ $userId ]);


        $sql2 = 'INSERT INTO OrderLine
        (
            Order_Id,
            Meal_Id,
            QuantityOrdered,
            PriceEach
        ) VALUES (?, ?, ?, ?)';

        $totalAmount = 0;

        foreach($basketItems as $basketItem)
        {
        	$totalAmount += $basketItem->quantity * $basketItem->securePrice;

            $database->executeSql( $sql2, [ $orderId, $basketItem->mealId, $basketItem->quantity, $basketItem->securePrice ]);

        }


        $sql3 = 'UPDATE `Order`
				SET CompleteTimestamp = NOW(),
					TotalAmount       = ?,
					TaxAmount         = ? * TaxRate / 100
				WHERE Id = ?';

        $database->executeSql
        (
            $sql3, [ $totalAmount, $totalAmount, $orderId]
        );

        return $orderId;

    }

    public function payed($orderId) {

    	$database = new Database();

    	$sql = 'UPDATE `Order`
				      SET	Status = "payed"
				      WHERE Id = ?';

		$database->executeSql
        (
            $sql,
            [$orderId]
        );
    }

    public function deleteOrder($orderId) {
		$database = new Database();
    	$sql = 'DELETE FROM
    				`Order`
				WHERE Id = ?';

		$database->executeSql
        (
            $sql,
            [$orderId]
        );

    }

}
 ?>
