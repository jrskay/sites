<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	if(array_key_exists('user', $_SESSION) == false) {

            $http->redirectTo('/');

        }

        $orderModel = new OrderModel();
        $order = $orderModel->find($_GET['orderId']);

        // condition qui nous permet de sécuriser les orders en fonction de l'url quelqu'un pour s'amuser a supprimer les commandes des autres utilisateur et il peut tous supprimes les commandes dans la base de données
        if ($order['User_Id'] == $_SESSION['user']['UserId'] && $order['Status'] == "not payed" ) {


        	$orderModel->deleteOrder($_GET['orderId']);
            $http->redirectTo('/order');
        	exit();

        } else {

        	$http->redirectTo('/user/login');
        	exit();
        }


    }


    public function httpPostMethod(Http $http, array $formFields)
    {


    }


}
