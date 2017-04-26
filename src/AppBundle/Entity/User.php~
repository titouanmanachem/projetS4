<?php
// src/AppBundle/Entity/User.php
 
namespace AppBundle\Entity;
 
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user" )
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="victoire", type="integer"   )
     */
    protected $victoire  = 0;

    /**
     * @ORM\Column(name="classement", type="integer"  )
     */
    protected $classement = 0 ;

    /**
     * @ORM\Column(name="defaite", type="integer"  )
     */
    protected $defaite  = 0;

    /**
     * @ORM\OneToMany(targetEntity="Partie_circus", mappedBy="joueur1" )
     */
    protected $parties_j1;

    /**
     * @ORM\OneToMany(targetEntity="Partie_circus", mappedBy="joueur2")
     */
    protected $parties_j2;

    /**
     * @ORM\OneToMany(targetEntity="Partie_tournoi", mappedBy="joueur1")
     */
    protected $parties_tournoi_j1;

    /**
     * @ORM\OneToMany(targetEntity="Partie_tournoi", mappedBy="joueur2")
     */
    protected $parties_tournoi_j2;

    protected $allParties;
    protected $allParties_tournoi;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        // Partie Classique
        $this->parties_j1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parties_j2 = new \Doctrine\Common\Collections\ArrayCollection();

        $this->allParties = new \Doctrine\Common\Collections\ArrayCollection();

        // Partie Compétition
        $this->parties_tournoi_j1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parties_tournoi_j2 = new \Doctrine\Common\Collections\ArrayCollection();

        $this->allParties_tournoi = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add partiesJ1
     *
     * @param \AppBundle\Entity\Partie_circus $partiesJ1
     *
     * @return User
     */
    public function addPartiesJ1(\AppBundle\Entity\Partie_circus $partiesJ1)
    {
        $this->parties_j1[] = $partiesJ1;
        return $this;
    }

    /**
     * Remove partiesJ1
     *
     * @param \AppBundle\Entity\Partie_circus $partiesJ1
     */
    public function removePartiesJ1(\AppBundle\Entity\Partie_circus $partiesJ1)
    {
        $this->parties_j1->removeElement($partiesJ1);
    }

    /**
     * Get partiesj1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesJ1()
    {
        return $this->parties_j1;
    }

    /**
     * Add partiesJ2
     *
     * @param \AppBundle\Entity\Partie_circus $partiesJ2
     *
     * @return User
     */
    public function addPartiesJ2(\AppBundle\Entity\Partie_circus $partiesJ2)
    {
        $this->parties_j2[] = $partiesJ2;

        return $this;
    }

    /**
     * Remove partiesJ2
     *
     * @param \AppBundle\Entity\Partie_circus $partiesJ2
     */
    public function removePartiesJ2(\AppBundle\Entity\Partie_circus $partiesJ2)
    {
        $this->parties_j2->removeElement($partiesJ2);
    }

    /**
     * Get partiesJ2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesJ2()
    {
        return $this->parties_j2;
    }

    /**
     * Add parties_tournoiJ1
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesJ1
     *
     * @return User
     */
    public function addParties_tournoiJ1(\AppBundle\Entity\Partie_tournoi $partiesJ1)
    {
        $this->parties_tournoi_j1[] = $partiesJ1;
        return $this;
    }

    /**
     * Remove parties_tournoiJ1
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesJ1
     */
    public function removeParties_tournoiJ1(\AppBundle\Entity\Partie_tournoi $partiesJ1)
    {
        $this->parties_tournoi_j1->removeElement($partiesJ1);
    }

    /**
     * Get parties_tournoij1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties_tournoiJ1()
    {
        return $this->parties_tournoi_j1;
    }

    /**
     * Add parties_tournoiJ2
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesJ2
     *
     * @return User
     */
    public function addParties_tournoiJ2(\AppBundle\Entity\Partie_tournoi $partiesJ2)
    {
        $this->parties_tournoi_j2[] = $partiesJ2;

        return $this;
    }

    /**
     * Remove parties_tournoiJ2
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesJ2
     */
    public function removeParties_tournoiJ2(\AppBundle\Entity\Partie_tournoi $partiesJ2)
    {
        $this->parties_tournoi_j2->removeElement($partiesJ2);
    }

    /**
     * Get parties_tournoiJ2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties_tournoiJ2()
    {
        return $this->parties_tournoi_j2;
    }

    //get partie classique
    public function getAllParties()
    {
        $this->allParties[] = $this->parties_j1;
        $this->allParties[] = $this->parties_j2;

        return $this->allParties;

    }

    //gat partie compétition
    public function getAllParties_tournoi()
    {
        $this->allParties_tournoi[] = $this->parties_tournoi_j1;
        $this->allParties_tournoi[] = $this->parties_tournoi_j2;

        return $this->allParties_tournoi;

    }


    /**
     * Add partiesTournoiJ1
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesTournoiJ1
     *
     * @return User
     */
    public function addPartiesTournoiJ1(\AppBundle\Entity\Partie_tournoi $partiesTournoiJ1)
    {
        $this->parties_tournoi_j1[] = $partiesTournoiJ1;

        return $this;
    }

    /**
     * Remove partiesTournoiJ1
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesTournoiJ1
     */
    public function removePartiesTournoiJ1(\AppBundle\Entity\Partie_tournoi $partiesTournoiJ1)
    {
        $this->parties_tournoi_j1->removeElement($partiesTournoiJ1);
    }

    /**
     * Get partiesTournoiJ1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesTournoiJ1()
    {
        return $this->parties_tournoi_j1;
    }

    /**
     * Add partiesTournoiJ2
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesTournoiJ2
     *
     * @return User
     */
    public function addPartiesTournoiJ2(\AppBundle\Entity\Partie_tournoi $partiesTournoiJ2)
    {
        $this->parties_tournoi_j2[] = $partiesTournoiJ2;

        return $this;
    }

    /**
     * Remove partiesTournoiJ2
     *
     * @param \AppBundle\Entity\Partie_tournoi $partiesTournoiJ2
     */
    public function removePartiesTournoiJ2(\AppBundle\Entity\Partie_tournoi $partiesTournoiJ2)
    {
        $this->parties_tournoi_j2->removeElement($partiesTournoiJ2);
    }

    /**
     * Get partiesTournoiJ2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesTournoiJ2()
    {
        return $this->parties_tournoi_j2;
    }

    /**
     * Set defaite
     *
     * @param int $defaite
     *
     * @return Partie_circus
     */
    public function setDefaite($defaite)
    {
        $this->defaite = $defaite;

        return $this;
    }

    /**
     * Set victoire
     *
     * @param int $victoire
     *
     * @return Partie_circus
     */
    public function setVictoire($victoire)
    {
        $this->victoire = $victoire;

        return $this;
    }

    /**
     * Set Classement
     *
     * @param int $classement
     *
     * @return Partie_circus
     */
    public function setClassement($classement)
    {
        $this->classement = $classement;

        return $this;
    }

    /**
     * Get classement
     *
     * @return int
     */
    public function getClassement()
    {
        return $this->classement;
    }


    /**
     * Get defaite
     *
     * @return int
     */
    public function getDefaite()
    {
        return $this->defaite;
    }

    /**
     * Get vitoire
     *
     * @return int
     */
    public function getVictoire()
    {
        return $this->victoire;
    }
}
