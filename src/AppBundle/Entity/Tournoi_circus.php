<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi_circus
 *
 * @ORM\Table(name="tournoi_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Tournoi_circusRepository")
 */
class Tournoi_circus
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
     * @var int
     *
     * @ORM\Column(name="maxparticipant", type="integer")
     */
    private $maxparticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string")
     */
    private $nom;



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
     * Set maxparticipant
     *
     * @param integer $maxparticipant
     *
     * @return Tournoi_circus
     */
    public function setMaxparticipant($maxparticipant)
    {
        $this->maxparticipant = $maxparticipant;

        return $this;
    }

    /**
     * Get maxparticipant
     *
     * @return int
     */
    public function getMaxparticipant()
    {
        return $this->maxparticipant;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Tournoi_circus
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
        return $this->etat;
    }

    /**
     * Set nom
     *
     * @param integer $nom
     * @return Tournoi_circus
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}
