<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie_circus
 *
 * @ORM\Table(name="partie_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Partie_circusRepository")
 */
class Partie_circus
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
     *
     * @ORM\Column(name="etat", type="integer" )
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="gagnant", type="string", nullable=TRUE  )
     */
    private $gagnant;

    /**
     * @var int
     *
     * @ORM\Column(name="scorej1", type="integer", nullable=TRUE  )
     */
    private $scorej1;

    /**
     * @var int
     *
     * @ORM\Column(name="scorej2", type="integer", nullable=TRUE  )
     */
    private $scorej2;

    /**
     * @var id
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="parties_j1")
     */
    private $joueur1;

    /**
     * @var id
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="parties_j2")
     */
    private $joueur2;


    /**
     * @var tour
     *
     * @ORM\Column(name="tour", type="string")
     *
     */
    private $tour;

    /**
     * Get tour
     *
     * @return int
     */
    public function getTour()
    {
        return $this->tour;
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
     * Set etat
     *
     * @param int $etat
     *
     * @return Partie_circus
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }


    /**
     * Get scorej1
     *
     * @return int
     */
    public function getScorej1()
    {
        return $this->scorej1;
    }

    /**
     * Set scorej1
     *
     * @param int $scorej1
     *
     * @return Partie_circus
     */
    public function setScorej1($scorej1)
    {
        $this->scorej1 = $scorej1;

        return $this;
    }

    /**
     * Get scorej2
     *
     * @return int
     */
    public function getScorej2()
    {
        return $this->scorej2;
    }

    /**
     * Set scorej2
     *
     * @param int $scorej2
     *
     * @return Partie_circus
     */
    public function setScorej2($scorej2)
    {
        $this->scorej2 = $scorej2;

        return $this;
    }


    /**
     * Get gagnant
     *
     * @return int
     */
    public function getGagnant()
    {
        return $this->gagnant;
    }

    /**
     * Set gagnant
     *
     * @param int $gagnant
     *
     * @return Partie_circus
     */
    public function setGagnant($gagnant)
    {
        $this->gagnant = $gagnant;

        return $this;
    }




    /**
     * Set tour
     *
     * @param string $tour
     *
     * @return Partie_circus
     */
    public function setTour($tour)
    {
        $this->tour = $tour;

        return $this;
    }

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
     * Set joueur1
     *
     * @param integer $joueur1
     *
     * @return Partie_circus
     */
    public function setJoueur1($joueur1)
    {
        $this->joueur1 = $joueur1;

        return $this;
    }

    /**
     * Get joueur1
     *
     * @return \AppBundle\Entity\User
     */
    public function getJoueur1()
    {
        return $this->joueur1;
    }

    /**
     * Set joueur2
     *
     * @param \AppBundle\Entity\User $joueur2
     *
     * @return Partie_circus
     */
    public function setJoueur2($joueur2)
    {
        $this->joueur2 = $joueur2;

        return $this;
    }

    /**
     * Get joueur2
     *
     * @return \AppBundle\Entity\User
     */
    public function getJoueur2()
    {
        return $this->joueur2;
    }
}
