<?php

class BookingController
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


    // si le $_POST n'est pas vide on fait les étapes suivantes
    if (empty($_POST) == false)
    {
      // declare que $booking est un nouveau model de la classe BookingModel
      $booking = new BookingModel();
      // declare que $userId prend la valeur de user et id de $_SESSION
      $userId = $_SESSION['user']['Id'];
      // on envois $booking qui est le model de la classe BookingModel en fonction de la fonction setBooking et ses arguments que l'on a choisi
      $booking->setBooking($_POST['bookingYear'].'-'.$_POST['bookingMonth'].'-'.$_POST['bookingDay'], $_POST['bookingHour'].':'.$_POST['bookingMinute'], $_POST['numberOfSeats'], $userId);
    }
  }
}

?>
