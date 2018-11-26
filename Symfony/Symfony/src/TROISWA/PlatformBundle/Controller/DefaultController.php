<?php

namespace TROISWA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TROISWAPlatformBundle:Default:index.html.twig');
    }

    public function helloAction()
    {
      return $this->render('TROISWAPlatformBundle:Hello:hello.html.twig');
    }
    public function page1Action()
    {
      return $this->render('TROISWAPlatformBundle:Page1:page1.html.twig');
    }
    public function page2Action()
    {
      return $this->render('TROISWAPlatformBundle:Page2:page2.html.twig');
    }
    public function page3Action()
    {
      return $this->render('TROISWAPlatformBundle:Page3:page3.html.twig');
    }


}
