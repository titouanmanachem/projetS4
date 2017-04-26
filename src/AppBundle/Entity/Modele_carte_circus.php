<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele_carte_circus
 *
 * @ORM\Table(name="modele_carte_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Modele_carte_circusRepository")
 */
class Modele_carte_circus
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
     * @var string
     *
     * @ORM\Column(name="nom_carte", type="string", length=255)
     */
    private $nom_carte;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_carte", type="string", length=255)
     */
    private $categorie_carte;

    /**
     * @var string
     *
     * @ORM\Column(name="image_carte", type="string", length=255)
     */
    private $imageCarte;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur_carte", type="integer")
     */
    private $valeur_carte;



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
     * Set nom_carte
     *
     * @param string $nom_carte
     *
     * @return Modele_carte_circus
     */
    public function setNom_carte($nom_carte)
    {
        $this->nom_carte = $nom_carte;

        return $this;
    }

    /**
     * Get nom_carte
     *
     * @return string
     */
    public function getNom_carte()
    {
        return $this->nom_carte;
    }

    /**
     * Set categorie_carte
     *
     * @param integer $categorie_carte
     *
     * @return Modele_carte_circus
     */
    public function setCategorie_carte($categorie_carte)
    {
        $this->categorie_carte = $categorie_carte;

        return $this;
    }

    /**
     * Get categorie_carte
     *
     * @return int
     */
    public function getCategorie_carte()
    {
        return $this->categorie_carte;
    }

    /**
     * Set imageCarte
     *
     * @param string $imageCarte
     *
     * @return Modele_carte_circus
     */
    public function setImageCarte($imageCarte)
    {
        $this->imageCarte = $imageCarte;

        return $this;
    }

    /**
     * Get imageCarte
     *
     * @return string
     */
    public function getImageCarte()
    {
        return $this->imageCarte;
    }

    /**
     * Set valeur_carte
     *
     * @param integer $valeur_carte
     *
     * @return Modele_carte_circus
     */
    public function setValeur_carte($valeur_carte)
    {
        $this->valeur_carte = $valeur_carte;

        return $this;
    }

    /**
     * Get valeur_carte
     *
     * @return int
     */
    public function getValeur_carte()
    {
        return $this->valeur_carte;
    }
    
    /**
     * Set nomCarte
     *
     * @param string $nomCarte
     *
     * @return Modele_carte_circus
     */
    public function setNomCarte($nomCarte)
    {
        $this->nom_carte = $nomCarte;

        return $this;
    }

    /**
     * Get nomCarte
     *
     * @return string
     */
    public function getNomCarte()
    {
        return $this->nom_carte;
    }

    /**
     * Set valeurCarte
     *
     * @param integer $valeurCarte
     *
     * @return Modele_carte_circus
     */
    public function setValeurCarte($valeurCarte)
    {
        $this->valeur_carte = $valeurCarte;

        return $this;
    }

    /**
     * Get valeurCarte
     *
     * @return integer
     */
    public function getValeurCarte()
    {
        return $this->valeur_carte;
    }

    /**
     * Set categorieCarte
     *
     * @param integer $categorieCarte
     *
     * @return Modele_carte_circus
     */
    public function setCategorieCarte($categorieCarte)
    {
        $this->categorie_carte = $categorieCarte;

        return $this;
    }

    /**
     * Get categorieCarte
     *
     * @return integer
     */
    public function getCategorieCarte()
    {
        return $this->categorie_carte;
    }
}
