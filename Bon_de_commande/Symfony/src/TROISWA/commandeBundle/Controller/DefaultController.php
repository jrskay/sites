<?php

namespace TROISWA\commandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TROISWAcommandeBundle:Default:index.html.twig');
    }
}
