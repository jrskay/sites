<?php

class SuccessController {
	    public function httpGetMethod(Http $http, array $queryFields)
    {

        if(array_key_exists('user', $_SESSION) == false){

            $http->redirectTo('/');

        }




    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }


}




?>
