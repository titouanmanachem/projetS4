<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Cartes_jeu_circus;
use AppBundle\Entity\Participant_tournoi_circus;
use AppBundle\Entity\Tournoi_circus;
use AppBundle\Repository\Tournoi_circusRepository;
use Proxies\__CG__\AppBundle\Entity\Chat_jeu_circus;
use Proxies\__CG__\AppBundle\Entity\Partie_circus;
use Proxies\__CG__\AppBundle\Entity\Tounoi_circus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CompetController extends Controller
{
    /**
     * @Route("/tournoi", name="competitionpage")
     */
    public function competitionAction(){

        $repopioche = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tournoi_circus');

        $repopa = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Participant_tournoi_circus');

        $user = $this->getUser();
        $id_co = $user->getId();
        $tournoi_inscrit = array();

        $participation = $repopa->findBy(array('id_participant'=> $id_co));
        
        for ($p=0; $p < count($participation); $p++){

            $tournoi_inscrit[] = $participation[$p]->getId_tournoi();

        }

        $tournois = $repopioche->findBy(array('etat'=> 0));



        return $this->render("AppBundle:Tournoi:tournois.html.twig", array('tournois_inscrit'=>$tournoi_inscrit ,'tournois'=>$tournois));
    }

    /**
     * @Route("/tournoi/affichage/{id}", name="affichagetournoi")
     */
    public function tournoi_affichageAction($id){

        $inscrit = 0 ;
        $user = $this->getUser();
        $id_co = $user->getId();

        $repopioche = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tournoi_circus');

        $tournois = $repopioche->findOneBy(array('id'=> $id ));

        $repoparticipant = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Participant_tournoi_circus');

        $repoj = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');

        $participant = $repoparticipant->findBy(array('id_tournoi'=> $id ));
        
        
        $maxparticipant = $tournois->getMaxparticipant();

        $palier1 = 0;
        $palier2 = 0;
        $palier3 = 0;
        $palier4 = 0;
        $palier5 = 0;
        $palier6 = 0;

        
        //ARBRE TOURNOI 4
        if ($maxparticipant == 4) {

            $palier1 = array();
            $palier2 = array();
            $palier3 = array();

            for ($a = 0; $a < $maxparticipant; $a++) {
                if ( empty($participant[$a]) == FALSE ) {
                    $nbv = $participant[$a]->getNbvictoire();
                    $idp = $participant[$a]->getIdparticipant();
                    $joueur = $repoj->findOneBy(array('id' => $idp));
                    $palier1[] = $joueur->getUsername();
                    if ($nbv >= 1) {
                        $palier2[] = $joueur->getUsername();
                    }
                    if ($nbv == 2) {
                        $palier3[] = $joueur->getUsername();
                    }
                } else {
                    $palier1[] = '';
                }
            }

            for ($i = 0 ; $i < 2 ; $i++ ){
                if ( empty($palier2[$i]) ){
                    $palier2[$i] = "";
                }
            }

            for ($i = 0 ; $i < 1 ; $i++ ){
                if ( empty($palier3[$i]) ){
                    $palier3[$i] = "";
                }
            }

        }

        //ARBRE TOURNOI 8
        if ($maxparticipant == 8) {

            $palier1 = array();
            $palier2 = array();
            $palier3 = array();
            $palier4 = array();

            for ($a = 0; $a < $maxparticipant; $a++) {
                if ( empty($participant[$a]) == FALSE ) {
                    $nbv = $participant[$a]->getNbvictoire();
                    $idp = $participant[$a]->getIdparticipant();
                    $joueur = $repoj->findOneBy(array('id' => $idp));
                    $palier1[] = $joueur->getUsername();
                    if ($nbv >= 1) {
                        $palier2[] = $joueur->getUsername();
                    }
                    if ($nbv >= 2) {
                        $palier3[] = $joueur->getUsername();
                    }
                    if ($nbv = 3) {
                        $palier4[] = $joueur->getUsername();
                    }
                } else {
                    $palier1[] = '';
                }
            }

            for ($i = 0 ; $i < 4 ; $i++ ){
                if ( empty($palier2[$i]) ){
                    $palier2[$i] = "";
                }
            }

            for ($i = 0 ; $i < 2 ; $i++ ){
                if ( empty($palier3[$i]) ){
                    $palier3[$i] = "";
                }
            }

            for ($i = 0 ; $i < 1 ; $i++ ){
                if ( empty($palier4[$i]) ){
                    $palier4[$i] = "";
                }
            }
            
        }
        ////////////////////


        $nombre = count($participant);

        for ($p = 0; $p < count($participant); $p++){

            $jouactuel = $participant[$p]->getIdparticipant();
            $id_jou = $jouactuel->getId();

            if ( $id_co == $id_jou ){
                $inscrit = 1 ;
            }

        }

        return $this->render("AppBundle:Tournoi:affichage_tournois.html.twig", array('inscrit' => $inscrit,'id'=>$id ,'palier3'=>$palier3 ,'palier2'=>$palier2 ,'palier1'=>$palier1 ,'tournois'=>$tournois,  'participants'=> $participant, 'nombre'=>$nombre ));
    }


    /**
     * @Route("/tournoi/new", name="new_tournoi")
     */
    public function new_tournoiAction( Request $request ){

        $nom = $request->request->get('nom');
        $nombre = $request->request->get('nombre');

        if ($nom == NULL ){
            return $this->render("AppBundle:Tournoi:new_tournois.html.twig" );
        }
        else {


            $tournoi = new Tournoi_circus();

            $tournoi->setMaxparticipant($nombre);
            $tournoi->setNom($nom);
            $tournoi->setEtat(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($tournoi);
            $em->flush();

            return $this->redirectToRoute('competitionpage');

        }

    }

    /**
     * @Route("/tournoi/inscription/{id}", name="inscription_tournoi")
     */
    public function inscription_tournoiAction( $id ){

        $repotour = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tournoi_circus');

        $tournoi = $repotour->findOneBy(array('id'=> $id ));

        $maxplace = $tournoi->getMaxparticipant();

        $repopar = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Participant_tournoi_circus');

        $participants = $repopar->findBy(array('id_tournoi'=> $id));

        $nombre = count($participants);

        $user = $this->getUser();
        $id_co = $user->getId();

        for ( $a =0 ; $a < count($participants) ; $a++ ){

            $participant = $participants[$a]->getIdparticipant();
            $idpar = $participant->getId();

            if ( $id_co == $idpar ){
                return $this->redirectToRoute('affichagetournoi', array('id'=> $id));
            }

        }

        if ( $nombre < $maxplace ) {

            $newparticipant = new Participant_tournoi_circus() ;
            $newparticipant->setIdParticipant( $user );
            $newparticipant->setId_tournoi( $tournoi );
            $newparticipant->setNbvictoire(0);
            $newparticipant->setEtat(0);

            if ( ($nombre + 1) == $maxplace ){
                $tournoi->setEtat(1);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($newparticipant);
            $em->persist($tournoi);
            $em->flush();

            if ( ($nombre + 1) == $maxplace ){
                return $this->redirectToRoute('affichagetournoicomplet', array('id'=> $id));
            }

            return $this->redirectToRoute('affichagetournoi', array('id'=> $id));
        }

        else {

            return $this->redirectToRoute('affichagetournoicomplet', array('id'=> $id));
        }

    }


    /**
     * @Route("/tournoi/ready/{id}", name="affichagetournoicomplet")
     */
    public function affiche_tournoiCompletAction( $id ){
        $repotour = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tournoi_circus');
        $repoj = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');
        $repopa = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Participant_tournoi_circus');

        $tournoi = $repotour->findOneBy(array('id'=>$id));
        $etat_tournoi = $tournoi->getEtat();
        $maxparticipant = $tournoi->getMaxparticipant();

        $participant = $repopa->findBy(array('id_tournoi'=>$id));

        if($etat_tournoi == 0){
            return $this->redirectToRoute('affichagetournoi', array('id'=> $id));
        }
        $inscrit = 0;
        $palier1 = 0;
        $palier2 = 0;
        $palier3 = 0;
        $palier4 = 0;
        $palier5 = 0;
        $palier6 = 0;
        //ARBRE TOURNOI 4
        if ($maxparticipant == 4) {
            $palier1 = array();
            $palier2 = array();
            $palier3 = array();
            for ($a = 0; $a < $maxparticipant; $a++) {
                if ( empty($participant[$a]) == FALSE ) {
                    $nbv = $participant[$a]->getNbvictoire();
                    $idp = $participant[$a]->getIdparticipant();
                    $joueur = $repoj->findOneBy(array('id' => $idp));
                    $palier1[] = $joueur->getUsername();
                    if ($nbv >= 1) {
                        $palier2[] = $joueur->getUsername();
                    }
                    if ($nbv == 2) {
                        $palier3[] = $joueur->getUsername();
                    }
                } else {
                    $palier1[] = '';
                }
            }
            for ($i = 0 ; $i < 2 ; $i++ ){
                if ( empty($palier2[$i]) ){
                    $palier2[$i] = "";
                }
            }
            for ($i = 0 ; $i < 1 ; $i++ ){
                if ( empty($palier3[$i]) ){
                    $palier3[$i] = "";
                }
            }
        }
        //ARBRE TOURNOI 8
        if ($maxparticipant == 8) {
            $palier1 = array();
            $palier2 = array();
            $palier3 = array();
            $palier4 = array();
            for ($a = 0; $a < $maxparticipant; $a++) {
                if ( empty($participant[$a]) == FALSE ) {
                    $nbv = $participant[$a]->getNbvictoire();
                    $idp = $participant[$a]->getIdparticipant();
                    $joueur = $repoj->findOneBy(array('id' => $idp));
                    $palier1[] = $joueur->getUsername();
                    if ($nbv >= 1) {
                        $palier2[] = $joueur->getUsername();
                    }
                    if ($nbv >= 2) {
                        $palier3[] = $joueur->getUsername();
                    }
                    if ($nbv = 3) {
                        $palier4[] = $joueur->getUsername();
                    }
                } else {
                    $palier1[] = '';
                }
            }
            for ($i = 0 ; $i < 4 ; $i++ ){
                if ( empty($palier2[$i]) ){
                    $palier2[$i] = "";
                }
            }
            for ($i = 0 ; $i < 2 ; $i++ ){
                if ( empty($palier3[$i]) ){
                    $palier3[$i] = "";
                }
            }
            for ($i = 0 ; $i < 1 ; $i++ ){
                if ( empty($palier4[$i]) ){
                    $palier4[$i] = "";
                }
            }
        }
        ////////////////////

        $nombre = count($participant);
        $user = $this->getUser();
        $id_co = $user->getId();

        for ($p = 0; $p < count($participant); $p++){

            $jouactuel = $participant[$p]->getIdparticipant();
            $id_jou = $jouactuel->getId();

            if ( $id_co == $id_jou ){
                $inscrit = 1 ;
            }

        }

        return $this->render("AppBundle:Tournoi:affichage_tournois_complet.html.twig", array('inscrit' => $inscrit,'id'=>$id ,'palier3'=>$palier3 ,'palier2'=>$palier2 ,'palier1'=>$palier1 ,'tournois'=>$tournoi,  'participants'=> $participant, 'nombre'=>$nombre ));
    }





    /**
     * @Route("/tournoi/deinscription/{id}", name="deinscription_tournoi")
     */
    public function deinscription_tournoiAction( $id ){

        $repotour = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tournoi_circus');

        $tournoi = $repotour->findOneBy(array('id'=> $id ));
        $etat = $tournoi->getEtat();

        $user = $this->getUser();
        $id_co = $user->getId();

        if ( $etat == 0 ){

            $repopar = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Participant_tournoi_circus');

            $participants = $repopar->findOneBy(array('id_tournoi'=> $id, 'id_participant' => $id_co));

            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($participants);
            $em->flush();

        }

            return $this->redirectToRoute('affichagetournoi', array('id'=> $id));

    }

}


