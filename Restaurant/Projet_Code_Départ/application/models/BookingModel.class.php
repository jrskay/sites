<?php

class BookingModel
{
  // on met en argument des variables que l'on a besoin c.a.d $bookingdate, $bookingtime, $numofseat, $userId
  public function setBooking($bookingdate, $bookingtime, $numofseat, $userId)
  {
    // declare que $booking est un nouveau model de la classe Database
    $booking = new Database();
    // On fait une requete sql pour envoyer des infos dans la table Booking !!! attention à l'injection SQL
    $sql= 'INSERT INTO Booking (BookingDate, BookingTime, NumberOfSeats, User_Id, CreationTimestamp)
          VALUES (?, ?, ?, ?, NOW())';
    // on stock dans un tableau qui est la variable $valbooking les valeurs que l'on a besoin c.a.d $bookingdate, $bookingtime, $numofseat, $userId
    $valbooking = [$bookingdate, $bookingtime, $numofseat, $userId];
    // on utilise la fonction executeSql qui vient de la class Database ou la fonction executeSql a pour argument ($sql, array $values = array()) c'est pour ça que à la ligne 14 on a mit les valeur dans un tableau
    $booking->executeSql($sql, $valbooking);
  }
}


 ?>
