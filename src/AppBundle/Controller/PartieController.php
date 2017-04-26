<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cartes_jeu_circus;
use AppBundle\Entity\Chat_jeu_circus;
use Proxies\__CG__\AppBundle\Entity\Partie_circus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PartieController extends Controller
{

    /**
     * @Route("/parties", name="partiespage")
     */
    public function partiesAction(){
        $em = $this->getDoctrine()->getManager();
        $parties = $em->getRepository('AppBundle:Partie_circus')->findBy(array('etat'=>0));
        return $this->render('AppBundle:Default:parties.html.twig', array(
            'parties' => $parties,
        ));
    }

    /**
     * @Route("/parties/abandon/{id}", name="abandon_partiespage")
     */
        public function abandon_partiesAction( $id ){

            $user = $this->getUser();

            $user_nom = $user->getUsername();

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Partie_circus')
            ;

            $repocarte = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Cartes_jeu_circus')
            ;

            $cartes = $repocarte->findBy(array('idpartie' => $id));

            for ($a=0; $a < count($cartes); $a++){
                $cartes[$a]->setSituationcarte(999);

                $em = $this->getDoctrine()->getManager();
                $em->persist($cartes[$a]);
                $em->flush();
            }

            $partie =  $repository->findOneBy(array('id'=>$id));

            $score = $this->score($id);

            $joueur1 = $partie->getJoueur1();
            $joueur2 = $partie->getJoueur2();

            $nom = array();
            $nom[1] = $joueur1->getUsername();
            $nom[2] = $joueur2->getUsername();

                if (  $user_nom == $nom[1] ){


                    $nowetat = $partie->getEtat();

                    if ($nowetat == 0){
                        $perdant = $nom[1];
                        $gagnant = $nom[2];
                        $partie->setGagnant($nom[2]);
                        $partie->setEtat(2);
                        $etat = 2 ;
                        $partie->setScorej1($score[1]);
                        $partie->setScorej2($score[2]);

                        $victoire = $joueur1->getDefaite();
                        $defaite = $joueur2->getVictoire();
                        $defaite = $defaite + 1 ;
                        $victoire = $victoire + 1;
                        $joueur2->setVictoire($victoire);
                        $joueur1->setDefaite($defaite);

                        $classj1 = $joueur1->getClassement();
                        $classj2 = $joueur1->getClassement();

                        $classj1 = $classj1 - 50 ;
                        $classj2 = $classj2 + 100 ;

                        $joueur1->setClassement( $classj1 );
                        $joueur2->setClassement( $classj2 );
                    }
                    else {
                        if ($nowetat == 1){
                            $etat = 1 ;
                            $gagnant = $partie->getGagnant();
                            if ( $gagnant == $nom[1]){
                                $perdant = $nom[2] ;
                            }
                            else {
                                $perdant = $nom[1];
                            }
                        }
                        else {
                            $etat = 2 ;
                            $gagnant = $partie->getGagnant();
                            if ( $gagnant == $nom[1]){
                                $perdant = $nom[2] ;
                            }
                            else {
                                $perdant = $nom[1];
                            }
                        }
                    }

                    $repository = $this->getDoctrine()->getManager();
                    $repository -> persist($partie);
                    $repository -> persist($joueur1);
                    $repository -> persist($joueur2);
                    $repository -> flush();

                    return $this->render('AppBundle:Default:finParties.html.twig', ['perdant'=> $perdant ,'etat'=>$etat , 'gagnant' => $gagnant , 'nom' => $nom , 'score' => $score ] );

                }
                else {

                    $nowetat = $partie->getEtat();


                    if ($nowetat == 0){

                        $perdant = $nom[2];
                        $gagnant = $nom[1];
                        $partie->setGagnant($nom[1]);
                        $partie->setEtat(2);
                        $etat = 2 ;
                        $partie->setScorej1($score[1]);
                        $partie->setScorej2($score[2]);
                        $victoire = $joueur1->getVictoire();
                        $defaite = $joueur2->getDefaite();
                        $defaite = $defaite + 1 ;
                        $victoire = $victoire + 1;
                        $joueur2->setDefaite($defaite);
                        $joueur1->setVictoire($victoire);

                        $classj1 = $joueur1->getClassement();
                        $classj2 = $joueur1->getClassement();

                        $classj2 = $classj2 - 50 ;
                        $classj1 = $classj1 + 100 ;

                        $joueur1->setClassement( $classj1 );
                        $joueur2->setClassement( $classj2 );
                    }
                    else {
                        if ($nowetat == 1){
                            $etat = 1 ;
                            $gagnant = $partie->getGagnant();
                            if ( $gagnant == $nom[1]){
                                $perdant = $nom[2] ;
                            }
                            else {
                                $perdant = $nom[1];
                            }
                        }
                        else {
                            $etat = 2 ;
                            $gagnant = $partie->getGagnant();
                            if ( $gagnant == $nom[1]){
                                $perdant = $nom[2] ;
                            }
                            else {
                                $perdant = $nom[1];
                            }
                        }
                    }

                    $repository = $this->getDoctrine()->getManager();
                    $repository -> persist($partie);
                    $repository -> persist($joueur1);
                    $repository -> persist($joueur2);
                    $repository -> flush();

                    return $this->render('AppBundle:Default:finParties.html.twig', ['perdant'=> $perdant ,'etat'=> $etat ,'gagnant' => $gagnant , 'nom' => $nom , 'score' => $score ] );
                }
            }


    /**
     * @Route("/parties/historique", name="historiqueParties")
     */
    public function historiqueAction(){

        $em = $this->getDoctrine()->getManager();
        $parties = $em->getRepository('AppBundle:Partie_circus')->findAll();

        return $this->render('AppBundle:Default:historiqueParties.html.twig', array(
            'parties' => $parties,
        ));
    }

    /**
     * @Route("/parties/add", name="addpartiespage")
     */
    public function addpartiesAction(){
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('AppBundle:Default:addparties.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * @Route("/parties/chat/{id}", name="chatParties")
     */
    public function chatpartiesAction( $id ,Request $request ){


        $message = new Chat_jeu_circus();
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $partie = $em->getRepository('AppBundle:Partie_circus')->findOneBy(array('id' => $id));


        $text = $request->request->get('message');
        
        $message->setIdjoueur($user);
        $message->setIdpartie($partie);
        $message->setMessage($text);


        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();

        return new Response(
            '',200
        );
    }

    /**
     * @Route("/parties/chat/load/{id}", name="chat_load_Parties")
     */
    public function chat_load_PartiesAction( $id ){

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Chat_jeu_circus')
        ;
        
        $messages = $repository->findBy(array('id_partie'=>$id));
        return $this->render('AppBundle:Default:chat_loadParties.html.twig', ['messages' => $messages  ] );
        
    }

    /**
     * @Route("parties/fin/{id}", name="fin_partie")
     */
    public function finPartieAction($id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;

        $partie =  $repository->findOneBy(array('id'=>$id));

        $score = $this->score($id);

        $repopioche = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus');

        $pioche = $repopioche->findOneBy(array('idpartie' => $partie , 'situationcarte' => 3 ));

        $joueur1 = $partie->getJoueur1();
        $joueur2 = $partie->getJoueur2();

        $nom = array();
        $nom[1] = $joueur1->getUsername();
        $nom[2] = $joueur2->getUsername();

        // VERIFICATION PARTIE BIEN TERMINER
        if ( $pioche == NULL ) {
            if ( $score[1] > $score[2] ){

                $nowetat = $partie->getEtat();

                if ($nowetat == 0){


                    $gagnant = $nom[1];
                    $partie->setGagnant($nom[1]);
                    $partie->setEtat(1);
                    $etat = 1 ;
                    $partie->setScorej1($score[1]);
                    $partie->setScorej2($score[2]);


                $victoire = $joueur1->getVictoire();
                $defaite = $joueur2->getDefaite();
                $defaite = $defaite + 1 ;
                $victoire = $victoire + 1;

                $joueur2->setDefaite($defaite);
                $joueur1->setVictoire($victoire);

                $classj1 = $joueur1->getClassement();
                $classj2 = $joueur1->getClassement();

                $classj1 = $classj1 + 100 ;
                $classj2 = $classj2 - 25 ;

                $joueur1->setClassement( $classj1 );
                $joueur2->setClassement( $classj2 );
                }

                else {
                    if ($nowetat == 1){
                        $etat = 1 ;
                        $gagnant = $partie->getGagnant();
                        if ( $gagnant == $nom[1]){
                            $perdant = $nom[2] ;
                        }
                        else {
                            $perdant = $nom[1];
                        }
                    }
                    else {
                        $etat = 2 ;
                        $gagnant = $partie->getGagnant();
                        if ( $gagnant == $nom[1]){
                            $perdant = $nom[2] ;
                        }
                        else {
                            $perdant = $nom[1];
                        }
                    }
                }

                $repository = $this->getDoctrine()->getManager();
                $repository -> persist($partie);
                $repository -> persist($joueur1);
                $repository -> flush();

                return $this->render('AppBundle:Default:finParties.html.twig', ['perdant'=> $perdant ,'etat'=>$etat ,'gagnant' => $gagnant , 'nom' => $nom , 'score' => $score ] );

            }
            else {

                $nowetat = $partie->getEtat();



                if ($nowetat == 0){

                    $gagnant = $nom[2];
                    $partie->setGagnant($nom[2]);
                    $partie->setEtat(1);
                    $etat = 1 ;
                    $partie->setScorej1($score[1]);
                    $partie->setScorej2($score[2]);
                $victoire = $joueur2->getVictoire();
                $defaite = $joueur1->getDefaite();
                $defaite = $defaite + 1 ;
                $victoire = $victoire + 1;
                $joueur1->setDefaite($defaite);
                $joueur2->setVictoire($victoire);

                    $classj1 = $joueur1->getClassement();
                    $classj2 = $joueur1->getClassement();

                    $classj2 = $classj2 + 100 ;
                    $classj1 = $classj1 - 25 ;

                    $joueur1->setClassement( $classj1 );
                    $joueur2->setClassement( $classj2 );

                }
                else {
                    if ($nowetat == 1){
                        $etat = 1 ;
                        $gagnant = $partie->getGagnant();
                        if ( $gagnant == $nom[1]){
                            $perdant = $nom[2] ;
                        }
                        else {
                            $perdant = $nom[1];
                        }
                    }
                    else {

                        $etat = 2;
                        $gagnant = $partie->getGagnant();
                        if ( $gagnant == $nom[1]){
                            $perdant = $nom[2] ;
                        }
                        else {
                            $perdant = $nom[1];
                        }
                    }
                }

                $repository = $this->getDoctrine()->getManager();
                $repository -> persist($partie);
                $repository -> persist($joueur2);
                $repository -> flush();

                return $this->render('AppBundle:Default:finParties.html.twig', ['perdant'=> $perdant,'etat'=>$etat , 'gagnant' => $gagnant , 'nom' => $nom , 'score' => $score  ] );
            }
        }
        else {

            return $this->redirectToRoute('play_partie', array('id' => $id));
        }


    }

    /**
     * @Route("parties/create/{id}", name="create_partie")
     */
    public function createPartieAction($id)
    {

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
        ;

        //Récupération de L'utilisateur actif
        $user = $this->getUser();


        $joueur = $repository->findOneBy(array('id' => $id));

        $partie = new Partie_circus();


        // Paramétrage des joueurs de la partie
        $partie->setJoueur1($user);
        $partie->setJoueur2($joueur);
        $partie->setTour($user);
        $partie->setGagnant('encours');
        $partie->setEtat(0);


        $em = $this->getDoctrine()->getManager();
        $em->persist($partie);
        $em->flush();

        $id_partie = $partie->getId();

        // récupére les cartes
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Modele_carte_circus')->findAll();

        //on mélange les cartes
        shuffle($cartes);


        for($i = 0; $i<8; $i++)
        {
            $c = new Cartes_jeu_circus();
            $c -> setIdjoueur($user->getId());
            $c -> setIdpartie($partie->getId());
            $c -> setIdcarte($cartes[$i]->getId());
            $c -> setSituationcarte(1);
            $c -> setOrdrecarte(0);
            $em -> persist($c);
        }

        for($i = 8; $i<16; $i++)
        {
            $c = new Cartes_jeu_circus();
            $c -> setIdjoueur($joueur->getId());
            $c -> setIdpartie($partie->getId());
            $c -> setIdcarte($cartes[$i]->getId());
            $c -> setSituationcarte(2);
            $c -> setOrdrecarte(0);
            $em -> persist($c);

        }


        for($i = 16; $i<count($cartes); $i++)
        {
            $c = new Cartes_jeu_circus();
            $c -> setIdjoueur(0);
            $c -> setIdpartie($partie->getId());
            $c -> setIdcarte($cartes[$i]->getId());
            $c -> setSituationcarte(3);
            $c -> setOrdrecarte(0);
            $em -> persist($c);

        }

        $em->flush();

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus')
        ;
        $cartes= $repository->findBy(array('idpartie' => $partie->getId() ));

        $tour = $partie->getTour();

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Modele_carte_circus')
        ;
        $modeles= $repository->findAll();
        $packet = array();

        for ($i = 0 ; $i<count($modeles); $i++){

            $idmodeles = $modeles[$i]->getId();


            for ($a = 0 ; $a<count($cartes); $a++){

                $idcartes = $cartes[$a]->getIdcarte();

                if ( $idmodeles == $idcartes ){

                    $packet[] = array( 'id'=>$modeles[$i]->getId(), 'value'=>$modeles[$i]->getValeurcarte(), 'situation'=>$cartes[$a]->getSituationcarte(), 'nom'=>$modeles[$i]->getNomcarte(), 'ordre'=>$cartes[$a]->getOrdrecarte() , 'image'=>$modeles[$i]->getImageCarte(), 'categorie'=>$modeles[$i]->getCategoriecarte() , 'idjoueur'=>$cartes[$a]->getIdjoueur() );

                }
                
            }

        }

        return $this->redirectToRoute('play_partie', array('id'=> $id_partie));
    }

    /**
     * @Route("/parties/verif/etat/{id}", name="verif_etat_partie")
     */
    public function VerifetatPartieAction( $id){
        $repopartie = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;
        $partie = $repopartie->findOneBy(array('id'=>$id));
        $etat_partie = $partie->getEtat();
        
        if ($etat_partie != 0){
            return new Response(
                'FIN'
            );
        }
        else {
            return new Response(
                'OK'
            );
        }
    }

    /**
     * @Route("/parties/verif/{partie}/{tour}", name="verif_partie")
     */
    public function VerifPartieAction( $partie,$tour){

        $repopartie = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;

        $game = $repopartie->findOneBy(array('id' => $partie  ));

        $touractuel = $game->getTour();

        if ( $touractuel == $tour ){

            return new Response(
                '',200
            );
        }
        else {

            return new Response(
                'CHANGEMENT DE TOUR'
            );
        }
    }

    /**
     * @Route("/parties/pioche/{partie}/{tour}", name="pioche_partie")
     */
    public function PiochePartieAction( $partie, $tour , Request $request){


        $time = time();
        $repopioche = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus')
        ;

        $pioche = $repopioche->findOneBy(array('idpartie' => $partie , 'situationcarte' => 3 ));
        

        $carte = $request->request->get('id_objet');
        $zone = $request->request->get('zone');
        
        $cartejouer = $repopioche->findOneBy(array('idpartie' => $partie , 'idcarte' => $carte ));



        if ( $pioche == NULL ) {

            return new Response(
                'FIN DE PARTIE'
            );

        }

        $repopartie = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;

        $game = $repopartie->findOneBy(array('id' => $partie  ));

        $joueur1 = $game -> getJoueur1();
        $joueur2 = $game -> getJoueur2();

        if ( $tour == $joueur1 ) {

            $prochaintour = $joueur2;
            $nouvellesit = 1 ;
            $nowjoueur = $joueur1->getId();
        }
        else {

            $prochaintour = $joueur1;
            $nouvellesit = 2 ;
            $nowjoueur = $joueur2->getId();
        }

        $game->setTour($prochaintour);


        $pioche->setSituationcarte( $nouvellesit );
        $cartejouer->setSituationcarte( $zone );
        $cartejouer->setIdjoueur($nowjoueur);
        $cartejouer->setOrdrecarte( $time );

        $repopioche = $this->getDoctrine()->getManager();
        $repopartie = $this->getDoctrine()->getManager();

        $repopioche -> persist($cartejouer);
        $repopioche -> persist($pioche);
        $repopartie -> persist($game);

        $repopioche -> flush();
        $repopartie -> flush();

        return new Response(
            ''
        );

    }

    /**
     * @Route("/parties/defausse/{partie}/{tour}", name="pioche_defausse")
     */
    public function PiocheDefausseAction( $partie,$tour , Request $request){

        $time = time();
        $id_carte = $request->request->get('id_carte_defausse');
        $carte = $request->request->get('id_objet');
        $zone = $request->request->get('zone');

        $repodefausse = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus')
        ;

        $cartejouer = $repodefausse->findOneBy(array('idpartie' => $partie , 'idcarte' => $carte ));
        $defausse= $repodefausse->findOneBy(array('idpartie' => $partie , 'idcarte' => $id_carte ));

        $repopartie = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;

        $game = $repopartie->findOneBy(array('id' => $partie  ));
        $joueur1 = $game -> getJoueur1();
        $joueur2 = $game -> getJoueur2();
        if ( $tour == $joueur1 ) {
            $prochaintour = $joueur2;
            $nouvellesit = 1 ;
            $nowjoueur = $joueur1->getId();
        }
        else {
            $prochaintour = $joueur1;
            $nouvellesit = 2 ;
            $nowjoueur = $joueur2->getId();
        }

        $game->setTour($prochaintour);

        $cartejouer->setSituationcarte( $zone );
        $cartejouer->setIdjoueur($nowjoueur);
        $cartejouer->setOrdrecarte( $time );
        $defausse->setSituationcarte( $nouvellesit );



        $repodefausse = $this->getDoctrine()->getManager();
        $repopartie = $this->getDoctrine()->getManager();

        $repodefausse -> persist($cartejouer);
        $repodefausse -> persist($defausse);
        $repopartie -> persist($game);

        $repodefausse -> flush();
        $repopartie -> flush();

        return new Response(
            ''
        );

    }




    /**
     * @Route("/parties/play/{id}", name="play_partie")
     */
    public function PlayPartieAction($id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Partie_circus')
        ;

        $repomessage = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Chat_jeu_circus')
        ;

        $message = $repomessage->findBy(array('id_partie' => $id ));

        $partie = $repository->findOneBy(array('id' => $id ));

        $etat_partie = $partie->getEtat();

        if ($etat_partie != 0 ){
           return $this->redirectToRoute('partiespage');
        }

        $user1 = $partie->getJoueur1() ;
        $user2 = $partie->getJoueur2();
        $tour= $partie->getTour();
        $idpartie = $partie->getId();

        //Récupération de L'utilisateur actif
        $useractif = $this->getUser();

        if ( $useractif == $user1 or $useractif == $user2 ) {

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Cartes_jeu_circus')
            ;

            $cartes = $repository->findBy(array('idpartie' => $id ));

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Modele_carte_circus')
            ;
            $modeles= $repository->findAll();
            $packet = array();

            for ($i = 0 ; $i<count($modeles); $i++){

                $idmodeles = $modeles[$i]->getId();


                for ($a = 0 ; $a<count($cartes); $a++){

                    $idcartes = $cartes[$a]->getIdcarte();

                    if ( $idmodeles == $idcartes ){

                        $packet[] = array(  'id'=>$modeles[$i]->getId(), 'value'=>$modeles[$i]->getValeurcarte(), 'situation'=>$cartes[$a]->getSituationcarte(), 'nom'=>$modeles[$i]->getNomcarte(), 'ordre'=>$cartes[$a]->getOrdrecarte() , 'image'=>$modeles[$i]->getImageCarte(), 'categorie'=>$modeles[$i]->getCategoriecarte() , 'idjoueur'=>$cartes[$a]->getIdjoueur() );

                    }

                }
            }

            $zone = array();

                $id_actif = $useractif->getId();


                $zone[4]= $this->zonemax($id, 4 , $id_actif );
                $zone[5]= $this->zonemax($id, 5 , $id_actif  );
                $zone[6]= $this->zonemax($id, 6 , $id_actif );
                $zone[7]= $this->zonemax($id, 7 , $id_actif );
                $zone[8]= $this->zonemax($id, 8 , $id_actif );


            $zoned[9]= $this->zoned($id, 9 );
            $zoned[10]= $this->zoned($id, 10 );
            $zoned[11]= $this->zoned($id, 11 );
            $zoned[12]= $this->zoned($id, 12 );
            $zoned[13]= $this->zoned($id, 13 );





            $score = $this->score($id);
            
            return $this->render('AppBundle:Default:playPartie.html.twig', ['messages'=>$message,'score' => $score,  'zoned'=> $zoned, 'zone'=> $zone, 'idpartie' => $idpartie ,'tour' => $tour ,'useractif' => $useractif, 'packet' => $packet , 'user1'=>$user1 , 'user2'=>$user2] );
        }
        else {
            return $this->render('AppBundle:Default:errorParties.html.twig');
        }
    }


    /**
     * @param $partie
     * @param $zone
     * @return int
     * FONCTION RECUPERATION VALEUR MAX D'UNE ZONE D'UN JOUEUR
     */
    private function zonemax($partie , $zone , $id_joueur ){

        $max = 0;

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus');

        $cartes = $repository->findBy(array('idpartie' => $partie));

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Modele_carte_circus');
        $modeles = $repository->findAll();

        for ($i = 0; $i < count($modeles); $i++) {

            $idmodeles = $modeles[$i]->getId();


            for ($a = 0; $a < count($cartes); $a++) {

                $idcartes = $cartes[$a]->getIdcarte();

                if ($idmodeles == $idcartes) {

                    $ab = $cartes[$a]->getSituationcarte();
                    $joueur = $cartes[$a]->getIdjoueur();

                    if ($ab == $zone and $joueur == $id_joueur ) {
                        $ac = $modeles[$i]->getValeur_carte();
                        if ($max < $ac) {
                            $max = $ac;
                        }
                    }

                }


            }
        }

        return $max ;
    }
    //FIN  FIN FONCTION RECUPERATION VALEUR MAX DE CHAQUE ZONE

    /**
     * @param $partie
     * @param $zone
     * @return int
     * FONCTION RECUPERATION DERNIERE VALEUR DEFAUSSE
     */
    private function zoned($partie , $zone){

        $maxordre = -1;
        $maxid = -1 ;
        $maxval = -1;
        $maximg = -1;


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus');

        $cartes = $repository->findBy(array('idpartie' => $partie));

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Modele_carte_circus');

        $modeles = $repository->findAll();

        for ($i = 0; $i < count($modeles); $i++) {

            $idmodeles = $modeles[$i]->getId();

            for ($a = 0; $a < count($cartes); $a++) {

                $idcartes = $cartes[$a]->getIdcarte();

                if ($idmodeles == $idcartes) {

                    $ab = $cartes[$a]->getSituationcarte();
                    if ($ab == $zone) {

                        $ordre = $cartes[$a]->getOrdrecarte();
                        $id = $cartes[$a]->getIdcarte();
                        $val = $modeles[$i]->getValeur_carte();
                        $img = $modeles[$i]->getImageCarte();

                        if ( $maxordre < $ordre ) {

                            $maxordre = $ordre;
                            $maxid = $id ;
                            $maxval = $val ;
                            $maximg = $img ;
                        }

                    }

                }
            }
        }

        $def = array();
        $def[0] = $maxid ;
        $def[1] = $maxval ;
        $def[2] = $maximg ;
        return $def ;
    }
    //FIN  FIN FONCTION RECUPERATION VALEUR MAX DE CHAQUE ZONE



    /**
     * @param $partie
     * @return int
     * FONCTION calcul score
     */
    private function score($partie){

        $zone4 = 0 ;
        $zone5 = 0 ;
        $zone6 = 0 ;
        $zone7 = 0 ;
        $zone8 = 0 ;
        $zone4j2 = 0 ;
        $zone5j2 = 0 ;
        $zone6j2 = 0 ;
        $zone7j2 = 0 ;
        $zone8j2 = 0 ;
        $bonuszone4 = 1 ;
        $bonuszone5 = 1 ;
        $bonuszone6 = 1 ;
        $bonuszone7 = 1 ;
        $bonuszone8 = 1 ;
        $bonuszone4j2 = 1 ;
        $bonuszone5j2 = 1 ;
        $bonuszone6j2 = 1 ;
        $bonuszone7j2 = 1 ;
        $bonuszone8j2 = 1 ;
        $scorezone4 = 0 ;
        $scorezone5 = 0 ;
        $scorezone6 = 0 ;
        $scorezone7 = 0 ;
        $scorezone8 = 0 ;
        $scorezone4j2 = 0 ;
        $scorezone5j2 = 0 ;
        $scorezone6j2 = 0 ;
        $scorezone7j2 = 0 ;
        $scorezone8j2 = 0 ;


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartes_jeu_circus');



        $cartes = $repository->findBy(array('idpartie' => $partie));

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Modele_carte_circus');

        $modeles = $repository->findAll();

        $user = $this->getUser();

        $id_user = $user->getId();

        for ($i = 0; $i < count($modeles); $i++) {

            $idmodeles = $modeles[$i]->getId();

            for ($a = 0; $a < count($cartes); $a++) {

                $idcartes = $cartes[$a]->getIdcarte();

                if ($idmodeles == $idcartes) {

                    $idj = $cartes[$a]->getIdjoueur();


                    // SCORE JOUEUR CONNECTER
                    if ( $idj == $id_user ){
                        $sit = $cartes[$a]->getSituationcarte();
                        if ( $sit == 4 ){
                            if ( $zone4 == 0 ){
                                $scorezone4 = -20 ;
                                $zone4 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone4 = $bonuszone4 + 1 ;
                            }
                            $scorezone4 = $scorezone4 + $valeur;
                        }
                        if ( $sit == 5 ){
                            if ( $zone5 == 0 ){
                                $scorezone5 = -20 ;
                                $zone5 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone5 = $bonuszone5 + 1 ;
                            }
                            $scorezone5 = $scorezone5 + $valeur;
                        }
                        if ( $sit == 6 ){
                            if ( $zone6 == 0 ){
                                $scorezone6 = -20 ;
                                $zone6 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone6 = $bonuszone6 + 1 ;
                            }
                            $scorezone6 = $scorezone6 + $valeur;
                        }
                        if ( $sit == 7 ){
                            if ( $zone7 == 0 ){
                                $scorezone7 = -20 ;
                                $zone7 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone7 = $bonuszone7 + 1 ;
                            }
                            $scorezone7 = $scorezone7 + $valeur;
                        }
                        if ( $sit == 8 ){
                            if ( $zone8 == 0 ){
                                $scorezone8 = -20 ;
                                $zone8 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone8 = $bonuszone8 + 1 ;
                            }
                            $scorezone8 = $scorezone8 + $valeur;
                        }
                    }

                    // SCORE AUTRE JOUEUR
                    else {
                        $sit = $cartes[$a]->getSituationcarte();
                        if ( $sit == 4 ){
                            if ( $zone4j2 == 0 ){
                                $scorezone4j2 = -20 ;
                                $zone4j2 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone4j2 = $bonuszone4j2 + 1 ;
                            }
                            $scorezone4j2 = $scorezone4j2 + $valeur;
                        }
                        if ( $sit == 5 ){
                            if ( $zone5j2 == 0 ){
                                $scorezone5j2 = -20 ;
                                $zone5j2 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone5j2 = $bonuszone5j2 + 1 ;
                            }
                            $scorezone5j2 = $scorezone5j2 + $valeur;
                        }
                        if ( $sit == 6 ){
                            if ( $zone6j2 == 0 ){
                                $scorezone6j2 = -20 ;
                                $zone6j2 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone6j2 = $bonuszone6j2 + 1 ;
                            }
                            $scorezone6j2 = $scorezone6j2 + $valeur;
                        }
                        if ( $sit == 7 ){
                            if ( $zone7j2 == 0 ){
                                $scorezone7j2 = -20 ;
                                $zone7j2 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone7j2 = $bonuszone7j2 + 1 ;
                            }
                            $scorezone7j2 = $scorezone7j2 + $valeur;
                        }
                        if ( $sit == 8 ){
                            if ( $zone8j2 == 0 ){
                                $scorezone8j2 = -20 ;
                                $zone8j2 = 1 ;
                            }
                            $valeur = $modeles[$i]->getValeur_carte();
                            //SI CARTE EST UN BONUS
                            if ( $valeur == 0 ){
                                $bonuszone8j2 = $bonuszone8j2 + 1 ;
                            }
                            $scorezone8j2 = $scorezone8j2 + $valeur;
                        }
                    }

                }
            }
        }

        //CALCUL DES SCORES

        $scoretotalj1 = ($scorezone4 * $bonuszone4) + ($scorezone5 * $bonuszone5 ) + ($scorezone6 * $bonuszone6 ) + ($scorezone7 * $bonuszone7) + ($scorezone8 * $bonuszone8);

        $scoretotalj2 = ($scorezone4j2 * $bonuszone4j2) + ($scorezone5j2 * $bonuszone5j2 ) + ($scorezone6j2 * $bonuszone6j2 ) + ($scorezone7j2 * $bonuszone7j2) + ($scorezone8j2 * $bonuszone8j2);

        $score = array();

        $score[1] = $scoretotalj1 ;
        $score[2] = $scoretotalj2 ;
        return $score ;
    }
    //FIN CALCUL SCORE


}


