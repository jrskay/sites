<?php

namespace TROISWA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use TROISWA\PlatformBundle\Entity\Advert;

class AdvertController extends Controller
{
    public function indexAction($name)
    {
      // ça c'était avant la cration de la ltable advert
      // $listAdverts = array(
      //     array(
      //       'title'   => 'Recherche développpeur Symfony',
      //       'id'      => 1,
      //       'author'  => 'Alexandre',
      //       'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
      //       'date'    => new \Datetime()),
      //     array(
      //       'title'   => 'Mission de webmaster',
      //       'id'      => 2,
      //       'author'  => 'Hugo',
      //       'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
      //       'date'    => new \Datetime()),
      //     array(
      //       'title'   => 'Offre de stage webdesigner',
      //       'id'      => 3,
      //       'author'  => 'Mathieu',
      //       'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
      //       'date'    => new \Datetime())
      //   );


      $repository = $this->getDoctrine()->getManager()->getRepository('TROISWAPlatformBundle:Advert');

      $listAdverts = $repository->findAll();


    	$content = $this->get('templating')->render('TROISWAPlatformBundle:Home:index.html.twig', ["nom" => $name, 'listAdverts' => $listAdverts]);

        return new Response($content);

    }
    public function viewAction($id)
    {
      // ça c'etait avant la creation de le bdd
   		// $advert = array(
      //     'title'   => 'Recherche développpeur Symfony3',
      //     'id'      => $id,
      //     'author'  => 'Alexandre',
      //     'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
      //     'date'    => new \Datetime()
      //   );
      $repository = $this->getDoctrine()->getManager()->getRepository('TROISWAPlatformBundle:Advert');

        $advert = $repository->find(2);

        return $this->render('TROISWAPlatformBundle::view.html.twig', array(
          'advert' => $advert
        ));

    }
    public function addAction(Request $request)
    {
      $advert = new Advert();

        $advert->setTitle('Recherche développeur Symfony.');
        $advert->setAuthor('Alexandre');
        $advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");


        $em = $this->getDoctrine()->getManager();

        $em->persist($advert);

        //$em->detach($advert);  retire $avdert du persist
		    //$em->clear();  vide entièrement persist
        //var_dump($em->contains($comment)); // Affiche false dit si il y a $comment persisté

        $em->flush();

      return $this->render('TROISWAPlatformBundle:Add:add.html.twig');

    }
    public function editAction($id)
    {
    $advert = array(
      'title'   => 'Recherche développpeur Symfony',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
      'date'    => new \Datetime()
    );

    return $this->render('TROISWAPlatformBundle:Edit:edit.html.twig', array(
      'advert' => $advert
    ));



    }

}


// notation pour le twig
// <!-- {{ }} pour mettre des variable -->
// <!-- {% %} pour mettre du code  -->
// <!-- on met :: pour avoir le layout de app -->
?>
