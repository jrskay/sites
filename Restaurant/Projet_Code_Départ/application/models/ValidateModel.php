<?php
/**
 *
 */
class ValidateModel
{
  // on met en argument des variables que l'on a besoin c.a.d $bookingdate, $bookingtime, $numofseat, $userId
  public function setOrder($userId, $totalamount, $taxrate, $taxamount, $status )
  {
    // declare que $booking est un nouveau model de la classe Database
    $order = new Database();
    // On fait une requete sql pour envoyer des infos dans la table Order !!! attention à l'injection SQL
    $sql= 'INSERT INTO Order (User_Id, TotalAmount, TaxRate, $TaxAmount, CreationTimestamp,
          CompleteTimestamp, Status)
          VALUES (?, ?, ?, ?, NOW(), NOW(), ?)';
    // on stock dans un tableau qui est la variable $valbooking les valeurs que l'on a besoin c.a.d $bookingdate, $bookingtime, $numofseat, $userId
    $valorder = [$userId, $totalamount, $taxrate, $taxamount, $status];
    // on utilise la fonction executeSql qui vient de la class Database ou la fonction executeSql a pour argument ($sql, array $values = array()) c'est pour ça que à la ligne 14 on a mit les valeur dans un tableau
    $order->executeSql($sql, $valorder);
  }

  public function setOrderShow($value)
  {

  }
}
?>
