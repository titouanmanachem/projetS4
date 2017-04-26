<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant_tournoi_circus
 *
 * @ORM\Table(name="participant_tournoi_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Participant_tournoi_circusRepository")
 */
class Participant_tournoi_circus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="Tournoi_circus")
     */
    private $id_tournoi;

    /**
     * @var int
     *
     * @ORM\Column(name="nbvictoire", type="integer")
     */
    private $nbvictoire;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $id_participant;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set id_tournoi
     *
     * @param integer $id_tournoi
     *
     * @return Participant_tournoi_circus
     */
    public function setId_tournoi($id_tournoi)
    {
        $this->id_tournoi = $id_tournoi;

        return $this;
    }

    /**
     * Get id_tournoi
     *
     * @return int
     */
    public function getId_tournoi()
    {
        return $this->id_tournoi;
    }


    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Participant_tournoi_circus
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->Etat;
    }

    /**
     * Set nbvictoire
     *
     * @param integer $nbvictoire
     *
     * @return Participant_tournoi_circus
     */
    public function setNbvictoire($nbvictoire)
    {
        $this->nbvictoire = $nbvictoire;

        return $this;
    }

    /**
     * Get nbvictoire
     *
     * @return int
     */
    public function getNbvictoire()
    {
        return $this->nbvictoire;
    }

    /**
     * Set idParticipant
     *
     * @param \AppBundle\Entity\User $idParticipant
     *
     * @return Participant_tournoi_circus
     */
    public function setIdParticipant(\AppBundle\Entity\User $idParticipant = null)
    {
        $this->id_participant = $idParticipant;

        return $this;
    }

    /**
     * Get idParticipant
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdParticipant()
    {
        return $this->id_participant;
    }

    /**
     * Set idTournoi
     *
     * @param \AppBundle\Entity\Tournoi_circus $idTournoi
     *
     * @return Participant_tournoi_circus
     */
    public function setIdTournoi(\AppBundle\Entity\Tournoi_circus $idTournoi = null)
    {
        $this->id_tournoi = $idTournoi;

        return $this;
    }

    /**
     * Get idTournoi
     *
     * @return \AppBundle\Entity\Tournoi_circus
     */
    public function getIdTournoi()
    {
        return $this->id_tournoi;
    }
}
