<?php

class LogoutController
{



	public function httpPostMethod(Http $http, array $formFields)
    {




    }


     public function httpGetMethod(Http $http, array $queryFields)
    {
    	session_destroy();
        $http->redirectTo('/');

    }
}
