<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cartes_jeu_circus;
use Proxies\__CG__\AppBundle\Entity\Partie_circus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
     public function indexAction(){
       return $this->render("AppBundle:Default:hello.html.twig");
   }


    /**
     * @Route("/classement", name="classement")
     */
    public function classementAction(){

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');

        $users = $repository->findBy(
            array('enabled'=> 1),
            array('classement' => 'DESC')
        );

        return $this->render("AppBundle:Default:classement.html.twig", array('users'=>$users) );
    }

    /**
     * @Route("/notification", name="notification")
     */
    public function notificationAction(){

        $user = $this->getUser();

        $user_id = $user->getId();

        $repopartie= $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus');

        $parties = $repopartie->findAll();

        return $this->render("AppBundle:Default:notification.html.twig", array('parties'=> $parties , 'id_joueur'=> $user_id ));
    }

}




