<?php

class ValidateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    /* Méthode appelée en cas de requête HTTP GET
		 * L'argument $http est un objet permettant de faire des redirections etc.
		 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.*/


     if(array_key_exists('user', $_SESSION) == false || array_key_exists('orderId', $_GET) == false) {

           $http->redirectTo('/');

       }

       $orderModel = new OrderModel();

       $order = $orderModel->find($_GET['orderId']);

       if($order['Status'] == 'payed') {
           $http->redirectTo('/order');
       }

   }

  public function httpPostMethod(Http $http, array $formFields)
  {
    /* Méthode appelée en cas de requête HTTP POST
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.*/


    // si le $_POST n'est pas vide on fait les étapes suivantes
    if(empty($_POST) == false) {

			$orderModel = new OrderModel();

      $order = $orderModel->find($_GET['orderId']);

			$totalTTC = $order['TotalAmount'] + $order['TaxAmount'];

			$stripeAmount = $totalTTC * 100;

      var_dump($stripeAmount);

      if($order['Status'] == 'not payed') {

      \Stripe\Stripe::setApiKey('sk_test_2TilEnqmwvlQ2wva3r9GVVvL');
      //$_POST['first_name'];

                     $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

                 	$first_name = $_POST['first_name'];
                     $last_name = $_POST['last_name'];

                     $token = $_POST['stripeToken'];

                     // create customer

                     $customer = \Stripe\Customer::create(array(
                         "email" => $_SESSION['user']['Email'],
                         "source" => $token
                     ));

                     $charge = \Stripe\Charge::create(array(
                         "amount" => $stripeAmount,
                         "currency" => "eur",
                         "description"=>"commande ok",
                         "customer" => $customer->id
                     ));

                     $orderModel->payed($_GET['orderId']);

     				$http->redirectTo('/success?tid='.$charge->id.'&orderId='.$_GET['orderId']);

                 } else {

                     $http->redirectTo('/order');

                 }

             }


         }


     }

     ?>
