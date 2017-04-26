<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie_tournoi
 *
 * @ORM\Table(name="partie_tournoi")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Partie_tournoiRepository")
 */
class Partie_tournoi
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="parties_tournoi_j1")
     */
    private $id_participant;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="parties_tournoi_j2")
     */
    private $id_participant2;
    
    

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
     * @return Partie_tournoi
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
     * Set idparticipant
     *
     * @param integer $idparticipant
     *
     * @return Partie_tournoi
     */
    public function setId_participant($id_participant)
    {
        $this->id_participant = $id_participant;

        return $this;
    }

    /**
     * Get id_participant
     *
     * @return int
     */
    public function getId_participant()
    {
        return $this->id_participant;
    }

    /**
     * Set id_participant2
     *
     * @param integer $id_participant2
     *
     * @return Partie_tournoi
     */
    public function setId_participant2($id_participant2)
    {
        $this->id_participant2 = $id_participant2;

        return $this;
    }

    /**
     * Get id_participant2
     *
     * @return int
     */
    public function getId_participant2()
    {
        return $this->id_participant2;
    }

    /**
     * Set idTournoi
     *
     * @param \AppBundle\Entity\Tournoi_circus $idTournoi
     *
     * @return Partie_tournoi
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

    /**
     * Set idParticipant
     *
     * @param \AppBundle\Entity\Participant_tournoi_circus $idParticipant
     *
     * @return Partie_tournoi
     */
    public function setIdParticipant(\AppBundle\Entity\Participant_tournoi_circus $idParticipant = null)
    {
        $this->id_participant = $idParticipant;

        return $this;
    }

    /**
     * Get idParticipant
     *
     * @return \AppBundle\Entity\Participant_tournoi_circus
     */
    public function getIdParticipant()
    {
        return $this->id_participant;
    }

    /**
     * Set idParticipant2
     *
     * @param \AppBundle\Entity\Participant_tournoi_circus $idParticipant2
     *
     * @return Partie_tournoi
     */
    public function setIdParticipant2(\AppBundle\Entity\Participant_tournoi_circus $idParticipant2 = null)
    {
        $this->id_participant2 = $idParticipant2;

        return $this;
    }

    /**
     * Get idParticipant2
     *
     * @return \AppBundle\Entity\Participant_tournoi_circus
     */
    public function getIdParticipant2()
    {
        return $this->id_participant2;
    }
}
