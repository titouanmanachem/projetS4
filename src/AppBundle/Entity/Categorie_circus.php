<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Categorie_circus
 *
 * @ORM\Table(name="categorie_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Categorie_circusRepository")
 */
class Categorie_circus
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Categories
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }
    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Categories
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
        return $this;
    }
    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}
