<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartes_jeu_circus
 *
 * @ORM\Table(name="cartes_jeu_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Cartes_jeu_circusRepository")
 */
class Cartes_jeu_circus
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
     * @ORM\Column(name="idcarte", type="integer")
     */
    private $idcarte;

    /**
     * @var int
     *
     * @ORM\Column(name="idpartie", type="integer")
     */
    private $idpartie;

    /**
     * @var int
     *
     * @ORM\Column(name="idjoueur", type="integer")
     */
    private $idjoueur;

    /**
     * @var int
     *
     * @ORM\Column(name="situationcarte", type="integer")
     */
    private $situationcarte;

    /**
     * @var int
     *
     * @ORM\Column(name="ordrecarte", type="integer")
     */
    private $ordrecarte;


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
     * Set idcarte
     *
     * @param integer $idcarte
     *
     * @return Cartes_jeu_circus
     */
    public function setIdcarte($idcarte)
    {
        $this->idcarte = $idcarte;

        return $this;
    }

    /**
     * Get idcarte
     *
     * @return int
     */
    public function getIdcarte()
    {
        return $this->idcarte;
    }

    /**
     * Set idpartie
     *
     * @param integer $idpartie
     *
     * @return Cartes_jeu_circus
     */
    public function setIdpartie($idpartie)
    {
        $this->idpartie = $idpartie;

        return $this;
    }

    /**
     * Get idpartie
     *
     * @return int
     */
    public function getIdpartie()
    {
        return $this->idpartie;
    }

    /**
     * Set idjoueur
     *
     * @param integer $idjoueur
     *
     * @return Cartes_jeu_circus
     */
    public function setIdjoueur($idjoueur)
    {
        $this->idjoueur = $idjoueur;

        return $this;
    }

    /**
     * Get idjoueur
     *
     * @return int
     */
    public function getIdjoueur()
    {
        return $this->idjoueur;
    }

    /**
     * Set situationcarte
     *
     * @param integer $situationcarte
     *
     * @return Cartes_jeu_circus
     */
    public function setSituationcarte($situationcarte)
    {
        $this->situationcarte = $situationcarte;

        return $this;
    }

    /**
     * Get situationcarte
     *
     * @return int
     */
    public function getSituationcarte()
    {
        return $this->situationcarte;
    }

    /**
     * Set ordrecarte
     *
     * @param integer $ordrecarte
     *
     * @return Cartes_jeu_circus
     */
    public function setOrdrecarte($ordrecarte)
    {
        $this->ordrecarte = $ordrecarte;

        return $this;
    }

    /**
     * Get ordrecarte
     *
     * @return int
     */
    public function getOrdrecarte()
    {
        return $this->ordrecarte;
    }
}
